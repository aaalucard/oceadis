<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SectionsDepartment */
/* @var $form yii\widgets\ActiveForm */
?>
<h1>Assign user to department:</h1>
<div class="assign-department">
	<?= DetailView::widget([
        'model' => $profile,
        'attributes' => [
            'name',
            'user.username',
        ],
    ]) ?>
</div>
<br>
<div class="sections-department-form">

    <?php $form = ActiveForm::begin(); ?>

   	<?= $form->field($model, 'id_department')->widget(Select2::classname(), [
	    'data' => $departments,
	    'options' => ['placeholder' => 'Select a department ...'],
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
