<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PageSections */

$this->title = Yii::t('app', 'Create Page Sections');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Page Sections'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-sections-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
