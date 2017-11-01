<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserDepartment */

$this->title = Yii::t('app', 'Update User Department: {nameAttribute}', [
    'nameAttribute' => $model->id_user,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Departments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_user, 'url' => ['view', 'id_user' => $model->id_user, 'id_department' => $model->id_department]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="user-department-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
