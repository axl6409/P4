<?php


namespace App\Table;


use Core\Table\Table;

class StoriesTable extends Table {

    /**
     * Get last stories
     * @return array
     */
    public function last() {
        return $this->query("
            SELECT *
            FROM stories
            ORDER BY date DESC 
        ");
    }

}