<?php

namespace src\useCases\parser;

use src\entities\Instagram;
use src\entities\Post;
use src\forms\scrapper\PostForm;
use src\repositories\PostRepository;

class PostService
{
    /**
     * @var PostRepository
     */
    private PostRepository $posts;

    /**
     * PostService constructor.
     * @param PostRepository $pages
     */
    public function __construct(PostRepository $pages)
    {
        $this->posts = $pages;
    }

    /**
     * @param PostForm $form
     * @return Post
     */
    public function createOrUpdate(PostForm $form): Post
    {
        if ($post = $this->posts->get($form->id)) {
            $post->edit($form->image, $form->caption);
        } else {
            $post = Post::create(
                $form->id,
                $form->url,
                $form->image,
                $form->caption,
                $form->ownerId,
                $form->createdAt
            );
        }

        $this->posts->save($post);
        return $post;
    }
}
