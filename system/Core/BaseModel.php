<?php

namespace System\Core;

use EmptyIterator;
use System\DB\MySql;

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

    public function order($column, $direction = 'ASC')
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
            $class = get_class($item);
            $obj = new $class;

            foreach ($item as $key => $value) {
                $obj->{$key} = $value;
            }
            $return[] = $obj;
        }

        $this->resetVars();

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
        $obj = $this->where($this->pk, $id);
        return $obj;
    }

    private function buildSelectQuery()
    {
        $this->sql = "SELECT {$this->select} FROM {$this->table}";

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
    }
}
