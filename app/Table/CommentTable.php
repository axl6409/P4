<?php


namespace App\Table;


use Core\Table\Table;

class CommentTable extends Table {

    protected $table = 'comments';

    public function last() {
        return $this->query("
            SELECT comments.id, comments.content, users.username as user, posts.title as post
            FROM comments
            JOIN users ON user_id = users.id
            JOIN posts ON post_id = posts.id
            ORDER BY comments.date DESC
            LIMIT 10
        ");
    }

    /**
     * Récupere les derniers commentaires
     * @return array
     */
    public function lastByStory($id)
    {
        return $this->query("
            SELECT comments.id, comments.content, posts.id as post
            FROM comments
            JOIN posts ON post_id = posts.id
            WHERE comments.post_id = ?
            ORDER BY comments.date DESC
        ", [$id]);
    }

}