<?php

namespace src\repositories;

use src\entities\Post;

class PostRepository
{
    /**
     * @param $id
     * @return Post|null
     */
    public function get($id): ?Post
    {
        return Post::findOne($id);
    }

    /**
     * @param Post $post
     */
    public function save(Post $post): void
    {
        if (!$post->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    /**
     * @param Post $post
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function remove(Post $post): void
    {
        if (!$post->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }
}
