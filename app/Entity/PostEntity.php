<?php

namespace App\Entity;

use Core\Entity\Entity;

class PostEntity extends Entity {

    public function getUrl() {
        return 'index.php?p=posts.single&id=' . $this->id;
    }

    public function getUrladmin() {
        return 'index.php?p=admin.posts.edit&id=' . $this->id;
    }

    public function getExcerpt() {
        $html = '<p>' . substr($this->content, 0, 550) . '...</p>';
        $html .= '<p class="see-more"><a class="btn btn-outline-danger" href="' . $this->getUrl() . '">Lire la suite</a></p>';
        return $html;
    }

    public function getExcerptadmin() {
        $html = '<p>' . substr($this->content, 0, 150) . '...</p>';
        $html .= '<p class="see-more"><a href="' . $this->getUrladmin() . '">Voir la suite</a></p>';
        return $html;
    }


}
