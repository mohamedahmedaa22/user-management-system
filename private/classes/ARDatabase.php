<?php

namespace Classes;

use PDO;
use PDOException;

class ARDatabase {
    protected $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function sanitizeRecord($record) {
        $record = stripslashes($record);
        $record = htmlspecialchars($record);
        $record = strtolower($record);
        return $record;
    }

    /**
     * Check if data is string to add single quotes to it for the SQL Clause
     *
     * @param mixed $record 
     * @return string 
     */
    public function isDataString(string $record = null) {
        if (is_string($record) && !strpos($record, 'NOW()')) {
            return "'{$record}'";
        }
        return $record;
    }

    public function insertRecord($table, array $args = []) {
        $sql = "INSERT INTO {$table} (";
        $sql .= implode(', ', array_keys($args));
        $sql .= ") VALUES (:";
        $sql .= implode(', :', array_keys($args));
        $sql .= ")";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute($args);
        return true;
    }

    public function getRecords($table, $records, $filters = null) {
        try {
            $sql = "SELECT ";
            if (count($records) == 1) {
                $sql .= "$records[0] ";
            } else {
                $sql .= implode(', ', $records)." ";
            }
            $sql .= "FROM {$table}";
            if (!is_null($filters)) {
                $sql .= " WHERE";
                $counter = 0;
                foreach ($filters as $filter => $value) {
                    if (count($filters) == 1) {
                        $sql .= " $filter = ";
                        $sql .= is_string($value) ? "'$value'" : $value;
                        continue;
                    }
                    $sql .= " $filter = ";
                    $sql .= is_string($value) ? "'$value'" : $value;
                    if ($counter != count($filters) -1) {
                        $sql .= " AND";
                    }
                    $counter++;
                }
            }

            $stmt = $this->connection->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {

            return ['error' => $e->getMessage(), 'sql' => $sql];
            
        } 
    }

    public function updateRecord($table, $updates, $filters) {
        try {
            $sql = "UPDATE $table SET ";
            foreach ($updates as $record => $value) {
                $sql .= $record . " = " . $this->isDataString($value) . ", ";
            }
            $sql = substr($sql, 0, -2);
            $sql .= " WHERE ";
            foreach ($filters as $key => $filter) {
                $sql .= $key . " = " . $this->isDataString($filter) . " AND ";
            }
            $sql = substr($sql, 0, -5);
            
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            return [
                'status' => false,
                'error' => $e->getMessage()
            ];
        }
    }
}