<?php

namespace backend\controllers;

use Yii;
use common\models\DepartmentDocument;
use common\models\Department;
use common\models\Document;
use common\models\Sections;
use common\models\DepartmentDocumentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * DepartmentdocumentController implements the CRUD actions for DepartmentDocument model.
 */
class DepartmentdocumentController extends Controller
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
     * Lists all DepartmentDocument models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DepartmentDocumentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DepartmentDocument model.
     * @param integer $id_departmen
     * @param integer $id_document
     * @return mixed
     */
    public function actionView($id_departmen, $id_document,$id_section)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_departmen, $id_document,$id_section),
        ]);
    }

    /**
     * Creates a new DepartmentDocument model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DepartmentDocument();
        $departments = Department::find()->where(['active'=>'1'])->all();
        $documents = Document::find()->where(['active'=>'1'])->all();
        $sections = Sections::find()->where(['active'=>'1'])->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_departmen' => $model->id_departmen, 'id_document' => $model->id_document,'id_section'=>$model->id_section]);
        }

        return $this->render('create', [
            'model' => $model,
            'sections'=>ArrayHelper::map($sections,'id','name'),
            'documents' => ArrayHelper::map($documents,'id','name'),
            'departments' => ArrayHelper::map($departments,'id','name'),
        ]);
    }

    /**
     * Updates an existing DepartmentDocument model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_departmen
     * @param integer $id_document
     * @return mixed
     */
    public function actionUpdate($id_departmen, $id_document,$id_section)
    {
        $model = $this->findModel($id_departmen, $id_document);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_departmen' => $model->id_departmen, 'id_document' => $model->id_document,'id_section'=>$id_section]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DepartmentDocument model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_departmen
     * @param integer $id_document
     * @return mixed
     */
    public function actionDelete($id_departmen, $id_document,$id_section)
    {
        $this->findModel($id_departmen, $id_document)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DepartmentDocument model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_departmen
     * @param integer $id_document
     * @return DepartmentDocument the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_departmen, $id_document,$id_section)
    {
        if (($model = DepartmentDocument::findOne(['id_departmen' => $id_departmen, 'id_document' => $id_document,'id_section'=>$id_section])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
