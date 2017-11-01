<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\DepartmentDocument */

$this->title = $model->id_departmen;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Department Documents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-document-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_departmen' => $model->id_departmen, 'id_document' => $model->id_document], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_departmen' => $model->id_departmen, 'id_document' => $model->id_document], [
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
            [
            'attribute'=>'id_section',
            'value'=>$model->section->name,
            ],
            [
            'attribute'=>'id_departmen',
            'value'=>$model->departmen->name,
            ],
            [
            'attribute'=>'id_document',
            'value'=>$model->document->name,
            ],
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
