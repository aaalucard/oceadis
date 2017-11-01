<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\PageSectionImage */
/* @var $form yii\widgets\ActiveForm */
?>
<h1><?= $model->name ?></h1>
<fieldset>
<legend>Available Images For This Section</legend>
    <?php
    foreach ($pageSectionImages as $pageSectionImage) {
    ?>
    <img src="/oceadis/pagesection/<?=$pageSectionImage->hash ?>/<?= $pageSectionImage->dir_name ?>" width="300px">
    <?php
    }
    ?>
</fieldset>
<h3>Upload New Image</h3>
<div class="page-section-image-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelImage, 'image')->widget(FileInput::classname(), [
        'options' => [
            'accept' => 'image/*'
        ],
        'pluginOptions' => [
            'showUpload' => false,
            'browseClass' => 'btn btn-primary btn-file btn-sm',
            'removeClass' => 'btn btn-warning btn-sm',
            'allowedFileExtensions' => ['jpg','gif','png']
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
