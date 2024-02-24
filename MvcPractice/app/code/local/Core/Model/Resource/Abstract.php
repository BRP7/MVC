<?php
class Core_Model_Resource_Abstract
{
    protected $_tableName = "";
    protected $_primaryKey = "";
    public function init($tableName, $primaryKey)
    {
        $this->_tableName = $tableName;
        $this->_primaryKey = $primaryKey;
    }
    public function load($id, $column = null)
    {
        $query = "SELECT * FROM {$this->_tableName} WHERE {$this->_primaryKey} = {$id} LIMIT 1 ";
        return $this->getAdapter()->fetchRow($query);
    }
    public function getTableName()
    {
        return $this->_tableName;
    }
    // public function save(Core_Model_Abstract $abstract)
    // {
    //     $obj = Mage::getModel('core/request');
    //     $id = $abstract->getId();
    //     if ($id) {
    //         $data = $abstract->getData();
    //         $sql = $this->editSql($this->getTableName(), $data, [$this->getPrimaryKey() => $id]);
    //         $id = $this->getAdapter()->update($sql);
    //     } else {
    //         $data = $abstract->getData();
    //         if (isset($data[$this->getPrimaryKey()])) {
    //             unset($data[$this->getPrimaryKey()]);
    //         }
    //         $sql = $this->insertSql($this->getTableName(), $data);
    //         $id = $this->getAdapter()->insert($sql);
    //         $abstract->setId($id);
    //     }
    // }
    public function save(Catalog_Model_Product $product)
    {
        $data = $product->getData();
        // var_dump( $data );
        if(isset($data[$this->getPrimaryKey()]) && !empty($data[$this->getPrimaryKey()])){
            // echo "Hello";
            unset($data[$this->getPrimaryKey()]);
            $sql = $this->editSql(
                $this->getTableName(),
                $data, 
                [$this->getPrimaryKey()=>$product->getId()]
            );
            $id = $this->getAdapter()->update($sql);
        }else{
        $sql = $this->insertSql($this->getTableName(),$data);
        $id = $this->getAdapter()->insert($sql);
        $product->setId($id);
    }
    }
    public function delete(Core_Model_Abstract $abstract)
    {
        $id = $abstract->getId();
        $sql = "DELETE FROM {$this->getTableName()} WHERE {$this->getPrimaryKey()} = $id";
        // $sql = $this->deleteSql($this->getTableName(), $id);
        $this->getAdapter()->delete($sql);
    }
    public function insertSql($table_name, $data)
    {
        $columns = $values = [];
        foreach ($data as $col => $val) {
            $columns[] = "`$col`";
            $values[] = "'" . addslashes(trim($val)) . "'";
        }

        $columns = implode(",", $columns);
        $values = implode(",", $values);
        return "INSERT INTO {$table_name} ({$columns}) VALUES ({$values});";
    }
    public function editSql($table_name, $data, $where)
    {
        $tmp_data = [];
        $where_con_arr = [];

        foreach ($data as $column => $value) {
            $tmp_data[] = "`$column` = '$value'";

        }
        foreach ($where as $column => $value) {
            $where_con_arr[] = "`$column` = '$value'";
        }

        $columns_str = implode(",", $tmp_data);
        $where_con_str = implode(" AND ", $where_con_arr);
        return "UPDATE {$table_name} set {$columns_str} WHERE {$where_con_str}";

    }
    // public function deleteSql($table_name, $where)
    // {
    //     $where_con_arr = [];

    //     foreach ($where as $field => $value) {
    //         $where_con_arr[] = "`$field`='$value'";
    //     }
    //     $where_con_str = implode(" AND ", $where_con_arr);
    //     return "DELETE FROM {$table_name} WHERE {$where_con_str}";

    // }
    public function getAdapter()
    {
        return new Core_Model_Db_Adapter();
    }
    public function getPrimaryKey()
    {
        return $this->_primaryKey;
    }
}

?>