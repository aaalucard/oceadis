<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\DepartmentDocument */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="department-document-form">

    <?php $form = ActiveForm::begin(); ?>
	<?= $form->field($model, 'id_section')->widget(Select2::classname(), [
	    'data' => $sections,
	    'options' => ['placeholder' => 'Select a state ...'],
	    'pluginOptions' => [
	        'allowClear' => true
	    ],
	]);
   	?>
    <?= $form->field($model, 'id_departmen')->widget(Select2::classname(), [
	    'data' => $departments,
	    'options' => ['placeholder' => 'Select a state ...'],
	    'pluginOptions' => [
	        'allowClear' => true
	    ],
	]);
   	?>
   	<?= $form->field($model, 'id_document')->widget(Select2::classname(), [
	    'data' => $documents,
	    'options' => ['placeholder' => 'Select a state ...'],
	    'pluginOptions' => [
	        'allowClear' => true
	    ],
	]);
	?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
