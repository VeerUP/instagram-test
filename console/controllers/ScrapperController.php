<?php

namespace console\controllers;

use src\readModels\OwnerReadRepository;
use Yii;
use InstagramScraper\Instagram;
use src\forms\scrapper\PostForm;
use src\useCases\parser\PostService;
use yii\console\Controller;
use yii\helpers\Console;

class ScrapperController extends Controller
{
    /**
     * @var OwnerReadRepository
     */
    private OwnerReadRepository $owner;
    /**
     * @var PostService
     */
    private PostService $service;

    /**
     * ScrapperController constructor.
     * @param $id
     * @param $module
     * @param PostService $service
     * @param OwnerReadRepository $owner
     * @param array $config
     */
    public function __construct($id, $module, PostService $service, OwnerReadRepository $owner, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->owner = $owner;
        $this->service = $service;
    }

    /**
     * Парсинг последних постов пользователей в Instagram
     */
    public function actionRun(): void
    {
        $instagram = new Instagram();
        $owners = $this->owner->getAll();
        foreach ($owners as $owner) {
            try {
                $medias = $instagram->getMedias($owner->username, Yii::$app->params['post.limit']);
            } catch (\Exception $e) {
                Yii::$app->errorHandler->logException($e);
                $this->stdout($owner->username . ' - get data failed, see log' . PHP_EOL, Console::FG_RED);
                continue;
            }
            foreach ($medias as $media) {
                $form = new PostForm([
                    'id' => $media->getId(),
                    'ownerId' => $owner->id,
                    'createdAt' => $media->getCreatedTime(),
                    'image' => $media->getImageThumbnailUrl(),
                    'caption' => $media->getCaption(),
                    'url' => $media->getLink(),
                ]);

                if ($form->validate() && $this->service->createOrUpdate($form)) {
                    $this->stdout($form->id . ' - ok' . PHP_EOL);
                } else {
                    $this->stdout($form->id . ' - error' . PHP_EOL);
                }
            }
        }

        $this->stdout('Done!' . PHP_EOL, Console::FG_GREEN, Console::BOLD);
    }
}
