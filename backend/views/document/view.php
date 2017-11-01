<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Document */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Documents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-retweet"></i> '.Yii::t('app', 'Share with'), ['share', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'descr',
            'document_name',
            [
            'attribute'=>'created_by',
            'value'=>$model->createdBy->username,
            ],
            'created_at',
            [
            'attribute'=>'updated_by',
            'value'=>$model->updatedBy->username,
            ],
            'updated_at',
        ],
    ]) ?>

</div>
<div class="col-md-12">
    <iframe id="visorpdf" src = "/oceadis/visor/#../<?= $model->dir_name ?>" width='100%' height='600px' allowfullscreen webkitallowfullscreen></iframe>
</div>
