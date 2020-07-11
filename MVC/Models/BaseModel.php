<?php
class BaseModel extends Database
{
    public $connect;
    public function __construct()
    {
        $this->connect = $this->connect();
    }
    public function all($table, $select = ['*'])
    {
        $columns = implode(',', $select);
        $sql = "SELECT ${columns} FROM ${table}";
        $results = $this->PDO($sql);
        return $results;
    }
    public function findCategory($table, $id)
    {
        $sql = "SELECT * FROM ${table} WHERE type_ID = ${id}";
        return $this->PDO($sql);
    }

    public function findProduct($table, $id)
    {
        $sql = "SELECT * FROM ${table} WHERE food_ID = ${id}";
        return $this->PDO($sql);
    }

    
    public function existEmail($table, $email)
    {
        $sql = "SELECT * FROM ${table} WHERE email = '${email}'";
        // $stmt = $this->connect->prepare($sql);
        // $stmt->execute();
        // return $stmt->fetchAll();

        if($stmt = $this->connect->prepare($sql)){
            if( $stmt->execute()){
                if($stmt->rowCount() == 1){
                    return 1;
                } else{
                    return 0;
                }
            }
            else return -1;
            }
        }
    

    public function create($table, $data = [])
    {
        $columns = implode(',', array_keys($data));
        $newValues = array_map(function ($value) {
            return "'" . $value . "'";
        }, array_values($data));
        $newValues = implode(',', $newValues);
        $sql = "INSERT INTO ${table}(${columns}) VALUES (${newValues}) ";
        // echo $sql;
        // die;
        $this->PDO($sql);
    }

    public function createUser($table, $data = [])
    {
        $columns = implode(',', array_keys($data));
        $newValues = array_map(function ($value) {
            return "'" . $value . "'";
        }, array_values($data));
        $newValues = implode(',', $newValues);
        $sql = "INSERT INTO ${table}(${columns}) VALUES (${newValues}) ";
        $stmt = $this->connect->prepare($sql);
        if($stmt->execute()){
            return true;
        }
        else{
            return false;
        }

    }

    public function update($table, $id, $data)
    {
        $dataSets = [];
        foreach ($data as $key => $value) {
            array_push($dataSets, "${key} = '" . $value . "'");
        };
        $dataSetString = implode(',', $dataSets);
        $sql = "UPDATE ${table} SET ${dataSetString}  WHERE type_ID = ${id}";
        // echo $sql;
        // die;
        $this->PDO($sql);
    }

    public function updateProduct($table, $id, $data)
    {
        $dataSets = [];
        foreach ($data as $key => $value) {
            array_push($dataSets, "${key} = '" . $value . "'");
        };
        $dataSetString = implode(',', $dataSets);
        $sql = "UPDATE ${table} SET ${dataSetString}  WHERE food_ID = ${id}";
        // echo $sql;
        // die;
        $this->PDO($sql);
    }

    public function updateUser($table, $id, $data)
    {
        $dataSets = [];
        foreach ($data as $key => $value) {
            array_push($dataSets, "${key} = '" . $value . "'");
        };
        $dataSetString = implode(',', $dataSets);
        $sql = "UPDATE ${table} SET ${dataSetString}  WHERE customer_ID = ${id}";
        // echo $sql;
        // die;
        $this->PDO($sql);
    }

    public function delete($table, $id)
    {
        $sql = "DELETE FROM ${table} WHERE type_ID = ${id}";
        // echo $sql;
        // die;
        $this->PDO($sql);
    }

    public function deleteProduct($table, $id)
    {
        $sql = "DELETE FROM ${table} WHERE food_ID = ${id}";
        // echo $sql;
        // die;
        $this->PDO($sql);
    }

    
    public function deleteUser($table, $id)
    {
        $sql = "DELETE FROM ${table} WHERE customer_ID = ${id}";
        // echo $sql;
        // die;
        $this->PDO($sql);
    }

    public function PDO($sql)
    {
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
