<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DepartmentDocument */

$this->title = Yii::t('app', 'Create Department Document');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Department Documents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-document-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    	'departments'=>$departments,
    	'documents'=>$documents,
    	'sections'=>$sections,
        'model' => $model,
    ]) ?>

</div>
