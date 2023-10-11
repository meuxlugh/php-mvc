<?php

class Database extends Application
{
    private $connection;

    public function __construct()
    {
        parent::__construct();
        $this->connection = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_BASE);
        if ($this->connection->connect_error) {
            die("Database connection error: " . $this->connection->connect_error);
        }
    }

    public function insert($table, $data)
    {
        $columns = implode(', ', array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";
        $insertSql = "INSERT INTO $table ($columns) VALUES ($values)";
        return $this->query($insertSql);
    }

    public function get($table, $conditions = array(), $fields = '*', $limit = null)
    {
        $where = '';
        if (!empty($conditions)) {
            $where = ' WHERE ';
            $conditionsArray = array();
            foreach ($conditions as $column => $value) {
                $conditionsArray[] = "$column = '$value'";
            }
            $where .= implode(' AND ', $conditionsArray);
        }

        $limitClause = '';
        if (!is_null($limit)) {
            $limitClause = " LIMIT $limit";
        }

        $sql = "SELECT $fields FROM $table" . $where . $limitClause;

        $result = $this->query($sql);
        $data = array();

        while ($row = $result->fetch_object()) {
            $data[] = $row;
        }
        if (count($data) == 1) {
            return $data[0];
        } else {
            return $data;
        }
    }

    public function update($table, $data, $id)
    {
        $updateData = array();

        foreach ($data as $column => $value) {
            $updateData[] = "$column = '$value'";
        }

        $updateSql = "UPDATE $table SET " . implode(', ', $updateData) . " WHERE id = " . $id;
        return $this->query($updateSql);
    }

    public function query($sql)
    {
        return $this->connection->query($sql);
    }

    public function close()
    {
        $this->connection->close();
    }
}
