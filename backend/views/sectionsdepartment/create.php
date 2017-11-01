<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SectionsDepartment */

$this->title = Yii::t('app', 'Create Sections Department');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sections Departments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sections-department-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'departments'=>$departments,
        'sections'=>$sections,
    ]) ?>

</div>
