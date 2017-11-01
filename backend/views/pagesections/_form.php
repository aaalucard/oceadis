<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget as Redactor;

/* @var $this yii\web\View */
/* @var $model common\models\PageSections */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-sections-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_section')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'code_section')->widget(Redactor::className(), [
    'settings' => [
        'lang' => 'en',
        'minHeight' => 1200,
        'plugins' => [
            
        ]
    ]
]); ?> 

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
