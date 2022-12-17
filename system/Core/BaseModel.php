<?php

namespace System\Core;

use System\DB\MySql;
use System\Exceptions\DataNotLoadedException;


abstract class BaseModel
{
    protected $table = '';
    protected $pk = 'id';
    protected $db = null;
    protected $sql = '';
    protected $select = '*';
    protected $conditions = '';
    protected $order = '';
    protected $offset = 0;
    protected $limit = null;
    protected $new = true;
    protected $related = [];

    public function __construct()
    {
        $this->db = new MySql;
    }

    public function select($columns)
    {
        $this->select = $columns;
        return $this;
    }

    public function where($column, $value, $operator = "=")
    {

        if (empty($this->conditions)) {
            $this->conditions = "{$column} {$operator} '{$value}'";
        } else {
            $this->conditions .= " AND {$column} {$operator} '{$value}'";
        }

        return $this;
    }

    public function orWhere($column, $value, $operator = "=")
    {
        $this->conditions .= " OR {$column} {$operator} '{$value}'";

        return $this;
    }

    public function orderBy($column, $direction = 'ASC')
    {
        if (empty($order)) {
            $this->order = "{$column} {$direction}";
        } else {
            $this->order .= ", {$column} {$direction}";
        }

        return $this;
    }

    public function offset($offset)
    {
        $this->offset = $offset;
        return $this;
    }

    public function limit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    public function get()
    {
        $this->buildSelectQuery();
        $data = [];

        if ($this->db->query($this->sql)) {
            $data = $this->db->fetch();
        }

        $return = [];

        foreach ($data as $item) {
            if (!empty($this->related)) {
                $class = get_class($this->related['obj']);
            } else {
                $class = get_class($this);
            }
            $obj = new $class;

            foreach ($item as $key => $value) {
                $obj->{$key} = $value;
            }
            $obj->new = false;
            $return[] = $obj;
        }

        $this->resetVars();
        // $this->new = false;

        return $return;
    }

    public function first()
    {
        $data = $this->get();

        if (!empty($data[0])) {
            return $data[0];
        } else {
            return false;
        }
    }

    public function load($id)
    {
        $obj = $this->where($this->pk, $id)->first();

        if ($obj) {
            $data = $this->getDataFromObject($obj);
            foreach ($data as $key => $value) {
                $this->{$key} = $value;
            }
            $this->new = false;
            unset($obj);
        } else {
            throw new DataNotLoadedException("Data with id: '{$id}' not found in " . get_class($this) . ".");
        }
    }

    public function save()
    {
        $data = $this->getDataFromObject($this);
        $set = [];

        foreach ($data as $key => $value) {

            if (!is_null($value)) {
                $set[] = "{$key} = '{$value}'";
            } else {
                $set[] = "{$key} = NULL";
            }
        }

        $set = implode(", ", $set);

        if ($this->new) {
            $this->sql = "INSERT INTO {$this->table} SET {$set}";
        } else {
            $this->sql = "UPDATE {$this->table} SET {$set} WHERE {$this->pk} = '{$this->{$this->pk}}'";
        }

        $this->db->query($this->sql);

        if ($this->new) {
            $this->{$this->pk} = $this->db->last_id();
            $this->new = false;
        }
        $this->resetVars();

        return true;
    }

    public function delete()
    {
        $this->sql = "DELETE FROM {$this->table} WHERE {$this->pk} = '{$this->{$this->pk}}'";
        $this->db->query($this->sql);

        $this->resetVars();
        $data = $this->getDataFromObject($this);

        foreach ($data as $key => $value) {
            unset($this->{$key});
        }
        $this->new = true;

        return true;
    }

    public function paginate($limit = 10)
    {
        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $pageno = $_GET['page'];
        } else {
            $pageno = 1;
        }

        $this->buildSelectQuery();

        $this->db->query($this->sql);

        $total = $this->db->num_rows();

        $pages = ceil($total / $limit);

        if ($pages < 1) {
            $pages = 1;
        }

        if ($pageno > $pages) {
            $pageno = $pages;
        }

        $offset = ($limit * $pageno) - $limit;

        $this->offset($offset);
        $this->limit($limit);

        $data = $this->get();

        $parts = [];

        if (isset($_SERVER['PATH_INFO'])) {
            $parts = explode('/', $_SERVER['PATH_INFO']);
        }

        if (!empty($parts)) {
            $path = url($parts[1]);
        } else {
            $path = url();
        }

        return [
            'pagination' => [
                'pageno' => $pageno,
                'pages' => $pages,
                'path' => $path,
                'offset' => $offset,
                'limit' => $limit,
                'total' => $total,
            ],
            'data' => $data
        ];
    }

    public function related($class_name, $fk, $location)
    {
        $obj = new $class_name;

        $this->related = [
            'obj' => $obj,
            'fk' => $fk,
            'location' => $location
        ];

        return $this;
    }

    public function getTable()
    {
        return $this->table;
    }

    public function getPk()
    {
        return $this->pk;
    }


    private function buildSelectQuery()
    {
        if (!empty($this->related)) {
            $table = $this->related['obj']->getTable();

            if ($this->related['location'] == 'child') {
                $this->where($this->related['fk'], $this->{$this->pk});
            } else {
                $this->where($this->related['obj']->getPk(), $this->{$this->related['fk']});
            }
        } else {
            $table = $this->table;
        }

        $this->sql = "SELECT {$this->select} FROM {$table}";

        if (!empty($this->conditions)) {
            $this->sql .= " WHERE {$this->conditions}";
        }

        if (!empty($this->order)) {
            $this->sql .= " ORDER BY {$this->order}";
        }

        if (!is_null($this->limit)) {
            $this->sql .= " LIMIT {$this->offset}, {$this->limit}";
        }
    }

    private function resetVars()
    {
        $this->sql = '';
        $this->select = '*';
        $this->conditions = '';
        $this->order = '';
        $this->offset = 0;
        $this->limit = null;
        $this->related = [];
    }

    private function getDataFromObject($obj)
    {
        $predefined = get_class_vars(get_class($obj));
        $all = get_object_vars($obj);
        $data = [];

        foreach ($all as $key => $value) {
            if (!key_exists($key, $predefined)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }
}
