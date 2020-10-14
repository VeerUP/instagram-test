<?php

/* @var yii\web\View $this */
/* @var src\entities\Post $post */

use yii\helpers\Html;

?>

<div class="row">
    <div class="col-md-4">
        <?= Html::a(
            Html::img($post->image, ['class' => 'img-thumbnail']),
            $post->url,
            ['target' => '_blank']
        ) ?>
    </div>
    <div class="col-md-8">
        <blockquote>
            <p><?= Html::encode($post->caption) ?></p>
            <footer>Опубликовал
                <cite>
                    <?= Html::a(
                        Html::encode($post->owner->username),
                        $post->owner->getUrl(),
                        ['target' => '_blank']
                    ) ?>
                </cite>
            </footer>
        </blockquote>
    </div>
</div>
<hr>
