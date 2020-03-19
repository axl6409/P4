<?php

namespace App\Table;

use App\App;

class Stories {

    public static function getLast() {
        return App::getDb()->query("
            SELECT stories.id, stories.title, stories.content, categories.title as category 
            FROM stories 
            LEFT JOIN categories 
                ON category_id = categories.id
        ", __CLASS__);
    }

    public function __get($key) {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }

    public function getURL() {
        return 'index.php?p=single&id=' . $this->id;
    }

    public function getExcerpt() {
        $html = '<p>' . substr($this->content, 0, 250) . '...</p>';
        $html .= '<p><a href="' . $this->getURL() . '">Voir la suite</a></p>';
        return $html;
    }

}

