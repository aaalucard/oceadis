<?php

namespace backend\controllers;

use Yii;
use common\models\SectionsDepartment;
use common\models\SectionsDepartmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Sections;
use common\models\Department;
use yii\helpers\ArrayHelper;

/**
 * SectionsdepartmentController implements the CRUD actions for SectionsDepartment model.
 */
class SectionsdepartmentController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all SectionsDepartment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SectionsDepartmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SectionsDepartment model.
     * @param integer $id_department
     * @param integer $id_section
     * @return mixed
     */
    public function actionView($id_department, $id_section)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_department, $id_section),
        ]);
    }

    /**
     * Creates a new SectionsDepartment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SectionsDepartment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_department' => $model->id_department, 'id_section' => $model->id_section]);
        }
        $departments = Department::find()->where(['active'=>'1'])->all();
        $sections = Sections::find()->where(['active'=>'1'])->all();
        return $this->render('create', [
            'model' => $model,
            'departments'=>ArrayHelper::map($departments,'id','name'),
            'sections'=>ArrayHelper::map($sections,'id','name'),
        ]);
    }

    /**
     * Updates an existing SectionsDepartment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_department
     * @param integer $id_section
     * @return mixed
     */
    public function actionUpdate($id_department, $id_section)
    {
        $model = $this->findModel($id_department, $id_section);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_department' => $model->id_department, 'id_section' => $model->id_section]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SectionsDepartment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_department
     * @param integer $id_section
     * @return mixed
     */
    public function actionDelete($id_department, $id_section)
    {
        $this->findModel($id_department, $id_section)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SectionsDepartment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_department
     * @param integer $id_section
     * @return SectionsDepartment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_department, $id_section)
    {
        if (($model = SectionsDepartment::findOne(['id_department' => $id_department, 'id_section' => $id_section])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
