<?php

namespace Core\Auth;

use Core\Database\Database;

class DBAuth {

    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }


    /**
     * @param $username
     * @param $password
     * @return boolean
     */
    public function login($username, $password) {
        $user = $this->db->prepare('SELECT * FROM users WHERE username = ?', [$username], null, true);
        if ($user) {
            if ($user->password === $password) {
                $_SESSION['auth'] = $user->id;
                $_SESSION['name'] = $user->username;
                $_SESSION['role'] = $user->role_id;
                return true;
            }
        }
        return false;
    }

    public function signIn($fields) {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $k => $v) {
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $sql_part = implode(', ', $sql_parts);
        return $this->db->prepare("INSERT INTO users SET $sql_part", $attributes, true);
    }

    public function logged() {
        if($_SESSION['role'] === '1') {
            return isset($_SESSION['auth']);
        }

    }
}
