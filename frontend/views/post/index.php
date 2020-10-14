<?php

/* @var yii\web\View $this */
/* @var src\entities\Post[] $posts */

use yii\helpers\Html;

$this->title = 'Последние посты из Instagram';
?>

<div class="post-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php if (!$posts) : ?>
        Посты не найдены
    <?php endif; ?>
    <?php foreach ($posts as $post) : ?>
        <?= $this->render('_item', ['post' => $post]) ?>
    <?php endforeach; ?>
</div>