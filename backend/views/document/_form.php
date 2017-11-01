<?php

use yii\helpers\Html;
use kartik\file\FileInput;
use kartik\form\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\Document */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="document-form">

     <?php $form = ActiveForm::begin([
        'id' => 'document-form',
        'type' =>  ActiveForm::TYPE_VERTICAL,
        'formConfig' => ['scrollToError' => true,],
        'options'=>['enctype'=>'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descr')->textInput(['maxlength' => true]) ?>

    <?php
        echo $form->field($model, 'PDF')->widget(FileInput::classname(), [
            'options' => [
                'accept' => 'pdf'
            ],
            'pluginOptions' => [
                'showUpload' => false,
                'browseClass' => 'btn btn-primary btn-file btn-sm',
                'removeClass' => 'btn btn-warning btn-sm',
                'allowedFileExtensions' => ['pdf','gif','png']
            ]
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    
</div>
