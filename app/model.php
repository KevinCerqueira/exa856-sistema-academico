<?php
include_once('database.php');
class Model{

public static function getTable($filters = [],$from='*', $columns = '*', $type) {
    $objects = [];
    $result = self::getResultSetFromSelect($filters,$from, $columns, $type);
    if($result) {
        while($row = $result->fetch_assoc()) {
            array_push($objects, $row);
        }
    }
    return $objects;
}

public static function update($tableName, $columns=[], $where=[] ,$type) {
    $sql = "UPDATE " .$tableName . " SET ";
    foreach($columns as $col=>$value) {
        $sql .= " ${col} = " . static::getFormatedValue($value,$type). ',';
    }
    $vazio=" ";
    $sql[strlen($sql) - 1] = ' ';
    $sql .= " ${vazio} ". static::getFilters($where, $type);
    
    Database::executeSQL($sql);
}

public static function deleteById($tableName, $where=[],$type) {
    $sql = "DELETE FROM " . $tableName . static::getFilters($where, $type);
    Database::executeSQL($sql);
}

public static function getResultSetFromSelect($filters = [], $from='*', $columns = '*', $type) {
    $sql = "SELECT DISTINCT ${columns} FROM ${from}"
        . static::getFilters($filters, $type);
    $result = Database::getResultFromQuery($sql);
    if($result->num_rows === 0) {
        return null;
    } else {
        return $result;
    }
}

private static function getFilters($filters, $type) {
    $sql = '';
    if(count($filters) > 0) {
        $sql .= " WHERE 1 = 1";
        foreach($filters as $column => $value) {
            if($column == 'raw') {
                $sql .= " AND {$value}";
            } else {
                $sql .= " AND ${column} = " . static::getFormatedValue($value, $type);
            }
        }
    }
    return "{$sql}";
}

private static function getFormatedValue($value, $type) {
    if(is_null($value)) {
        return "null";
    } elseif($type) {
        return "'${value}'";
    }else {
        return $value;
    }
}
}

?>