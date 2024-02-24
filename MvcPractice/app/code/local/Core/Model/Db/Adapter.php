<?php
class Core_Model_Db_Adapter
{
    public $host = 'localhost';
    public $db = 'ccc_practice';
    public $user = 'root';
    public $password = '';
    public $connect = null;
    public function connect()
    {
        if (is_null($this->connect)) {
            $this->connect = mysqli_connect($this->host, $this->user, $this->password, $this->db);
        }
        return $this->connect;
    }
    public function fetchAll($query)
    {
        $row=[];
        $result = mysqli_query($this->connect(), $query);
        while ($_row = mysqli_fetch_assoc($result)) {
            $row[] = $_row;
        }
        return $row;
    }
    public function fetchPairs($query)
    {
    }
    public function fetchOne($query)
    {
    }
    public function fetchRow($query)
    {
        $row = [];
        $this->connect();
        $result = mysqli_query($this->connect(), $query);
        while ($_row = mysqli_fetch_assoc($result)) {
            $row = $_row;
        }
        return $row;
    }
    public function insert($query)
    {
        $sql = mysqli_query($this->connect(), $query);
        if ($sql) {
            return mysqli_insert_id($this->connect());
        } else {
            return FALSE;
        }
    }
    public function update($query)
    {
        // echo 'Hello';
        $sql = mysqli_query($this->connect(), $query);
        if ($sql) {
            return True;
        } else {
            return FALSE;
        }
    }
    public function delete($query)
    {
        $sql = mysqli_query($this->connect(), $query);
        if ($sql) {
            return True;
        } else {
            return FALSE;
        }
    }
    public function query($query)
    {
    }

}

?>