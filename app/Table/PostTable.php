<?php


namespace App\Table;


use Core\Table\Table;

class PostTable extends Table {

    protected $table = 'posts';

    /**
     * Get last stories
     * @return array
     */
    public function last() {
        return $this->query("
            SELECT *
            FROM posts
            ORDER BY date DESC 
        ");
    }



}