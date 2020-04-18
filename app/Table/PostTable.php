<?php


namespace App\Table;


use Core\Table\Table;

/**
 * Class PostTable
 * @package App\Table
 */
class PostTable extends Table {

    /**
     * BDD Table - Posts
     * @var string
     */
    protected $table = 'posts';

    /**
     * Get last posts
     * @return array
     */
    public function last() {
        return $this->query("
            SELECT *
            FROM posts
            ORDER BY date ASC 
        ");
    }


}
