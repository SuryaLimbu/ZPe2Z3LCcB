<?php

class Database
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:dbname=woodlands;host=localhost', 'root', '');
    }

    public function listRecords($tableName)
    {
        $request = $this->pdo->prepare("SELECT * FROM $tableName");
        $request->execute();
        return $request;
    }


    // $table is tablename enclosed in ''
    // record is collection of record in array
    // use array('key'=>'value')
    function insert($table, $record)
    {
        $keys = array_keys($record);
        $keysWithComma = implode(',', $keys);
        $keysWithCommaColon = implode(', :', $keys);
        
        echo "INSERT INTO $table($keysWithComma) VALUES(:$keysWithCommaColon)";
        $stmt = $this->pdo->prepare("INSERT INTO $table($keysWithComma) VALUES(:$keysWithCommaColon)");
        $stmt->execute($record);
        $stmt->errorInfo();
    }
    function findAll($table)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table");
        $stmt->execute();
        return $stmt;
    }
    function getSortedValue($table,$sortingField){
        $stmt = $this->pdo->prepare("SELECT * FROM $table ORDER BY $sortingField ");
        $stmt->execute();
        return $stmt;
    }

    function findRow($table,$fieldName,$fieldValue)
    {
        // $pk = key($row);

        // echo "SELECT * FROM $table WHERE $fieldName=$fieldValue";
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE $fieldName=$fieldValue");
        $stmt->execute();
        $stmt->errorInfo();
        return $stmt;

    }
    function update($table,$record, $pkField, $pkValue)
    {
        echo $pkField;
        $valuesSet = "";
        foreach ($record as $key => $value) {
            $valuesSet .= "$key = '$value',";
        }
        echo "<br>" . $valuesSet =  rtrim($valuesSet, ',');
        $stmt = $this->pdo->prepare("UPDATE $table SET $valuesSet WHERE $pkField = $pkValue");
        $stmt->execute($record);
        $stmt->errorInfo();
    }
    function deleteRow($table,$pkRow)
    {
        $pkId = key($pkRow);
        $pkRow = $pkRow[$pkId];
        $stmt = $this->pdo->prepare("DELETE FROM $table WHERE $pkId = $pkRow ");
        $stmt->execute();
    }
    function setHeader($pageName)
    {
        header("Location: $pageName");
    }
}
