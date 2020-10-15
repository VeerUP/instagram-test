<?php

namespace src\readModels;

use src\entities\Post;

class PostReadRepository
{
    /**
     * @param int $limit
     * @return Post[]
     */
    public function getLast(int $limit): array
    {
        return Post::find()->with('owner')->orderBy(['created_at' => SORT_DESC])->limit($limit)->all();
    }
}
