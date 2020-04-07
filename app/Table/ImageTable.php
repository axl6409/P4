<?php


namespace App\Table;


use Core\Table\Table;

class ImageTable extends Table {

    protected $table = 'images';

    public function postImage($id) {
        return $this->query("
            SELECT images.id, images.name as image, posts.image_id as postImage
            From images
            JOIN posts ON image_id = images.id
            WHERE posts.image_id = ?
        ", [$id]);
    }

}
