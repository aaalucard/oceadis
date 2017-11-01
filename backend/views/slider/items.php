<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\SliderItems */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slider-items-form">

    <?php $form = ActiveForm::begin(); ?>
<?php /*
    <?= $form->field($modelItems, 'transition')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelItems, 'slotamount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelItems, 'hideafterloop')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelItems, 'hideslideonmobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelItems, 'easein')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelItems, 'easeout')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelItems, 'masterspeed')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelItems, 'thumb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelItems, 'rotate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelItems, 'fstransition')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelItems, 'fsmasterspeed')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelItems, 'fsslotamount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelItems, 'saveperformance')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelItems, 'tittle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelItems, 'description')->textInput(['maxlength' => true]) ?>
*/?>
    
    <?= $form->field($modelItems, 'slide')->widget(FileInput::classname(), [
        'options' => [
            'accept' => 'image/*'
        ],
        'pluginOptions' => [
            'showUpload' => false,
            'browseClass' => 'btn btn-primary btn-file btn-sm',
            'removeClass' => 'btn btn-warning btn-sm',
            'allowedFileExtensions' => ['jpg','gif','png','jpeg']
        ]
    ]); ?>
<?php /*
    <?= $form->field($modelItems, 'bgposition')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelItems, 'bgfit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelItems, 'bgrepeat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelItems, 'paralax')->textInput(['maxlength' => true]) ?>
*/ ?>
    <?= $form->field($modelItems, 'layer2_text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelItems, 'layer3_text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelItems, 'layer4_text')->textInput(['maxlength' => true]) ?>
<?php /*
    <?= $form->field($modelItems, 'created_by')->textInput() ?>

    <?= $form->field($modelItems, 'created_at')->textInput() ?>

    <?= $form->field($modelItems, 'updated_by')->textInput() ?>

    <?= $form->field($modelItems, 'updated_at')->textInput() ?>
*/ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
