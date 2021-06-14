<?php

namespace Classes;

use PDO;

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
        $sql = "SELECT ";
        if (count($records) == 1) {
            $sql .= "$records[0] ";
        } else {
            $sql .= implode(', ', $records);
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
    }
}