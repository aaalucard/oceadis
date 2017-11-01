<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PageSectionImage */

$this->title = Yii::t('app', 'Create Page Section Image');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Page Section Images'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-section-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
