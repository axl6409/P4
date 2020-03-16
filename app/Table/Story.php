<?php

namespace App\Table;

class Story {

    public function __get($key) {

        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$method();

    }

    public function getURL() {

        return 'index.php?p=single&id=' . $this->id;
    }

    public function getExcerpt() {
        $html = '<p>' . substr($this->content, 0, 250) . '</p>';
        $html .= '<p><a href="' . $this->getURL() . '">Voir la suite</a></p>';
        return $html;
    }

}
