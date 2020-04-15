<?php

namespace Core\Table;

use Core\Database\Database;

/**
 * Class Table
 * @package Core\Table
 */
class Table {

    protected $table;
    protected $db;

    /**
     * Table constructor.
     * @param Database $db
     */
    public function __construct(Database $db) {

        $this->db = $db;
        if (is_null($this->table)) {
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $table = strtolower(str_replace('Table', '', $class_name)) . 's'; //Get the table and add 's' at the end of the string
        }

    }

    /**
     * Query to All results
     * @return mixed
     */
    public function all() {
        return $this->query('SELECT * FROM ' . $this->table);
    }

    /**
     * Query to find by id
     * @param $id
     * @return mixed
     */
    public function find($id) {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
    }

    /**
     * Query to find by name
     * @param $name
     * @return mixed
     */
    public function findByName($name) {
        return $this->query("SELECT * FROM {$this->table} WHERE name = ?", [$name], true);
    }

    /**
     * Query to update field in table, find by id
     * @param $id
     * @param $fields
     * @return mixed
     */
    public function update($id, $fields) {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $k => $v) {
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $attributes[] = $id;
        $sql_part = implode(', ', $sql_parts);
        return $this->query("UPDATE {$this->table} SET $sql_part WHERE id = ?", $attributes, true);
    }

    /**
     * Query to extract values from a table
     * @param $key
     * @param $value
     * @return array
     */
    public function extract($key, $value){
        $records = $this->all();
        $return = [];
        foreach ($records as $v) {
            $return[$v->$key] = $v->$value;
        }

        return $return;
    }

    /**
     * Query to delete a field in table, find by id
     * @param $id
     * @return mixed
     */
    public function delete($id) {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id], true);
    }

    /**
     * Query to create a field in table
     * @param $fields
     * @return mixed
     */
    public function create($fields) {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $k => $v) {
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $sql_part = implode(', ', $sql_parts);
        return $this->query("INSERT INTO {$this->table} SET $sql_part", $attributes, true);
    }

    /**
     * Query to get a prepare or query method
     * @param $statement
     * @param null $attributes
     * @param bool $one
     * @return mixed
     */
    public function query($statement, $attributes = null, $one = false) {
        if ($attributes) {
            return $this->db->prepare(
                $statement,
                $attributes,
                str_replace('Table', 'Entity',get_class($this)),
                $one
            );
        } else {
            return $this->db->query(
                $statement,
                str_replace('Table', 'Entity',get_class($this)),
                $one
            );
        }
    }

}
