<?php

namespace console\controllers;

use src\useCases\console\PostService;
use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Console;

class CleanController extends Controller
{
    /**
     * @var PostService
     */
    private PostService $service;

    /**
     * CleanController constructor.
     * @param $id
     * @param $module
     * @param PostService $postService
     * @param array $config
     */
    public function __construct($id, $module, PostService $postService, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->service = $postService;
    }

    /**
     * @return int
     * @throws \yii\db\Exception
     */
    public function actionPost(): int
    {
        $cnt = $this->service->removeOld(Yii::$app->params['post.limit']);

        $this->stdout("Removed $cnt posts" . PHP_EOL, Console::FG_GREEN, Console::BOLD);
        return ExitCode::OK;
    }
}
