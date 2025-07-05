<?php

abstract class Model {
    protected static $table;
    protected static $columns = [];
    protected static $primary_key = 'id';

    public function __construct($data = []) {
        foreach (static::$columns as $column) {
            $this->$column = $data[$column] ?? null;
        }
    }

    public static function find($mysqli, $id) {
        $sql = sprintf("SELECT * FROM %s WHERE %s = ?", static::$table, static::$primary_key);
        $query = $mysqli->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();
        $data = $query->get_result()->fetch_assoc();
        return $data ? new static($data) : null;
    }

    public static function all($mysqli) {
        $sql = sprintf("SELECT * FROM %s", static::$table);
        $query = $mysqli->prepare($sql);
        $query->execute();
        $data = $query->get_result();
        return $data->fetch_all(MYSQLI_ASSOC);
    }

    public function save($mysqli) {
        $columns = array_filter(static::$columns, fn($c) => $c !== static::$primary_key);
        $placeholders = implode(', ', array_fill(0, count($columns), '?'));
        $cols = implode(', ', $columns);

        $sql = sprintf("INSERT INTO %s (%s) VALUES (%s)", static::$table, $cols, $placeholders);

        $stmt = $mysqli->prepare($sql);
        $values = array_map(fn($col) => $this->$col, $columns);
        $types = str_repeat('s', count($values));

        $stmt->bind_param($types, ...$values);
        return $stmt->execute();
    }
}