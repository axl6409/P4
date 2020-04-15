<?php


namespace App\Table;


use Core\Table\Table;

class CommentTable extends Table {

    protected $table = 'comments';

    public function last() {
        return $this->query("
            SELECT comments.id, comments.content, users.username as user, users.image as image, posts.title as post
            FROM comments
            JOIN users ON user_id = users.id
            JOIN posts ON post_id = posts.id
            ORDER BY comments.date DESC
        ");
    }

    public function comAlert() {
        return $this->query("
            SELECT comments.id, comments.content, users.username as user, posts.title as post
            FROM comments
            JOIN users ON user_id = users.id
            JOIN posts ON post_id = posts.id
            WHERE alert_id = 1
            ORDER BY comments.date DESC
        ");
    }

    /**
     * Récupere les derniers commentaires
     * @return array
     */
    public function lastByStory($id)
    {
        return $this->query("
            SELECT comments.id, comments.content, posts.id as post, users.username as user
            FROM comments
            JOIN posts ON post_id = posts.id
            JOIN users ON user_id = users.id
            WHERE comments.post_id = ? AND comments.alert_id = 2
            ORDER BY comments.date DESC
        ", [$id]);
    }

    public function newComment($content, $userId, $postId, $alertId, $date) {
        return $this->create([
            'content'   => $content,
            'user_id'   => $userId,
            'post_id'   => $postId,
            'alert_id'  => $alertId,
            'date'      => $date
        ]);
    }

}
