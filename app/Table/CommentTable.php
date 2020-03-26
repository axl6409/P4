<?php


namespace App\Table;


use Core\Table\Table;

class CommentTable extends Table {

    protected $table = 'comments';

    /**
     * Récupere les derniers commentaires
     * @return array
     */
    public function lastByStory($id)
    {
        return $this->query("
            SELECT comments.id, comments.content, posts.id as post
            FROM comments
            LEFT JOIN posts ON post_id = posts.id
            WHERE comments.post_id = ?
            ORDER BY comments.date DESC
        ", [$id]);
    }

}