<?php

namespace App\Table;

class Story {

    public function getURL() {

        return 'index.php?p=story$id=' . $this->id;
    }

    public function getExcerpt() {
        return $this->content;
    }

}

