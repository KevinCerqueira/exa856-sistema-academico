<?php
include_once('database.php');
class Adm{

public static function getTable($filters = [],$from='*', $columns = '*') {
    $objects = [];
    $result = self::getResultSetFromSelect($filters,$from, $columns);
    if($result) {
        while($row = $result->fetch_assoc()) {
            array_push($objects, $row);
        }
    }
    return $objects;
}

public static function getResultSetFromSelect($filters = [], $from='*', $columns = '*') {
    $sql = "SELECT DISTINCT ${columns} FROM ${from}"
        . static::getFilters($filters);
    $result = Database::getResultFromQuery($sql);
    if($result->num_rows === 0) {
        return null;
    } else {
        return $result;
    }
}

private static function getFilters($filters) {
    $sql = '';
    if(count($filters) > 0) {
        $sql .= " WHERE 1 = 1";
        foreach($filters as $column => $value) {
            if($column == 'raw') {
                $sql .= " AND {$value}";
            } else {
                $sql .= " AND ${column} = " . static::getFormatedValue($value);
            }
        }
    }
    return $sql;
}

private static function getFormatedValue($value) {
    if(is_null($value)) {
        return "null";
    /*} elseif(gettype($value) === 'string') {
        return "'${value}'";
    */} else {
        return $value;
    }
}
}

?>