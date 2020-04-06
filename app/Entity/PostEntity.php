<?php

namespace App\Entity;

use Core\Entity\Entity;

class PostEntity extends Entity {

    public function getUrl() {
        return 'index.php?p=posts.single&id=' . $this->id;
    }

    public function getExcerpt() {
        $html = '<p>' . substr($this->content, 0, 150) . '...</p>';
        $html .= '<p><a href="' . $this->getUrl() . '">Voir la suite</a></p>';
        return $html;
    }


}
