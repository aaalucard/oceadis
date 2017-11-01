<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DepartmentDocument */

$this->title = Yii::t('app', 'Update Department Document: {nameAttribute}', [
    'nameAttribute' => $model->id_departmen,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Department Documents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_departmen, 'url' => ['view', 'id_departmen' => $model->id_departmen, 'id_document' => $model->id_document]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="department-document-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
