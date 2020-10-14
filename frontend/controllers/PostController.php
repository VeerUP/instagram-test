<?php

namespace frontend\controllers;

use Yii;
use src\readModels\PostReadRepository;
use yii\web\Controller;

class PostController extends Controller
{
    /**
     * @var PostReadRepository
     */
    private PostReadRepository $posts;

    /**
     * PostController constructor.
     * @param $id
     * @param $module
     * @param PostReadRepository $posts
     * @param array $config
     */
    public function __construct($id, $module, PostReadRepository $posts, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->posts = $posts;
    }

    /**
     * @return string
     */
    public function actionIndex(): string
    {
        $posts = $this->posts->getLast(Yii::$app->params['post.limit']);

        return $this->render('index', [
            'posts' => $posts,
        ]);
    }
}
