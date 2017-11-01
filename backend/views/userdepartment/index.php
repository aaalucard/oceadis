<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\UserDepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'User Departments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-department-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
            'attribute'=>'Username',
            'value'=>'user.username',
            ],
            'name',
            [
            'attribute'=>'Department',
            'value'=>'user.userDepartment.department.name',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{department}',
                'buttons' =>[
                    'department' => function ($url,$model) {
                            return Html::a(
                                    '<span class="glyphicon glyphicon-cog"></span>', 
                                    $url,[
                                    'title' => Yii::t('app', 'Set Department')
                            ]);
                    },
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
