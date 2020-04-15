<?php

namespace App\Entity;

use Core\Entity\Entity;

/**
 * Class PostEntity
 * @package App\Entity
 */
class PostEntity extends Entity {

    /**
     * Get post url with th ID
     * @return string
     */
    public function getUrl() {
        return 'index.php?p=posts.single&id=' . $this->id;
    }

    /**
     * Get post url in the admin with ID
     * @return string
     */
    public function getUrladmin() {
        return 'index.php?p=admin.posts.edit&id=' . $this->id;
    }

    /**
     * Get the post excerpt
     * @return string
     */
    public function getExcerpt() {
        $html = '<p>' . substr($this->content, 0, 550) . '...</p>';
        $html .= '<p class="see-more"><a class="btn btn-outline-danger box-shadow" href="' . $this->getUrl() . '">Lire la suite</a></p>';
        return $html;
    }

    /**
     * Get the post excerpt in the admin
     * @return string
     */
    public function getExcerptadmin() {
        $html = '<p>' . substr($this->content, 0, 150) . '...</p>';
        $html .= '<p class="see-more"><a href="' . $this->getUrladmin() . '">Voir la suite</a></p>';
        return $html;
    }


}
