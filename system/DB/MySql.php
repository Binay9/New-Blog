<?php

namespace System\DB;


class MySql
{
    protected $con = null;
    protected $result = null;

    public function __construct()
    {
        $this->con = new \PDO(
            "mysql:host=" . config('db_host') . ";dbname=" . config('db_name'),
            config('db_user'),
            config('db_pass')
        );

        $this->con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function query($sql)
    {
        $this->result = $this->con->prepare($sql);
        $this->result->execute();
    }

    public function fetch()
    {
        return $this->result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function num_rows()
    {
        return $this->result->rowCount();
    }

    public function last_id()
    {
        return $this->con->lastInsertId();
    }
}
