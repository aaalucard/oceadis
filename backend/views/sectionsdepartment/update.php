<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SectionsDepartment */

$this->title = Yii::t('app', 'Update Sections Department: {nameAttribute}', [
    'nameAttribute' => $model->id_department,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sections Departments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_department, 'url' => ['view', 'id_department' => $model->id_department, 'id_section' => $model->id_section]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sections-department-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
