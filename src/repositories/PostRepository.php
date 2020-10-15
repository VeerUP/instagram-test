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

    /**
     * TODO Так как LIMIT не работает в sub query, приходится выходить из положения другими способами
     * @param int $limit
     * @return int
     * @throws \yii\db\Exception
     */
    public function deleteAllWithoutLast(int $limit): int
    {
        $sql = 'DELETE FROM ' . Post::tableName() . ' WHERE id NOT IN (
            SELECT id FROM (
                SELECT id FROM ' . Post::tableName() . ' ORDER BY [[created_at]] DESC LIMIT 10
            ) t
        )';

        return Post::getDb()->createCommand($sql, [':limit' => $limit])->execute();
    }
}
