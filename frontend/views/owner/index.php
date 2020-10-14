<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel src\forms\search\OwnerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Аккаунты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="owner-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить аккаунт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="alert alert-info">
        Возможно добавление только открытых аккаунтов.
    </div>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'contentOptions' => ['style' => 'width: 100px'],
            ],
            [
                'attribute' => 'username',
                'label' => 'Аккаунт',
            ],
            [
                'attribute' => 'created_at',
                'format' => 'datetime',
                'filter' => false,
                'label' => 'Дата добавления',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
