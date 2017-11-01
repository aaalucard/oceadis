<?php

namespace backend\controllers;

use Yii;
use common\models\Document;
use common\models\Department;
use common\models\DepartmentDocument;
use common\models\Sections;
use common\models\DocumentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DocumentController implements the CRUD actions for Document model.
 */
class DocumentController extends Controller
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
     * Lists all Document models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DocumentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Document model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Document model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Document();

        if ($model->load(Yii::$app->request->post())) {
            $PDF = $model->uploadPDF();

            // revert back if no valid file instance uploaded
            if ($PDF === false) {
                $model->name = $PDF->name;
            }

            if ($model->validate()) {
                // upload only if valid uploaded file instance found
                if ($PDF !== false) { // delete old & overwrite - && unlink($oldFile)
                    $path = $model->dir_name;
                    if($PDF->saveAs(dirname(dirname(__DIR__)).$path)){
                        $model->save();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Document model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionShare($id){
        $model = $this->findModel($id);
        $departments = Department::find()->where('active = 1')->all();
        $sections = Sections::find()->where('active = 1')->all();
        //$users = 
        return $this->render('share', [
            'departments'=>$departments,
            'sections'=>$sections,
            'model' => $model,
        ]);
    }
    public function actionFastshare($section,$department,$document){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = new DepartmentDocument();
        $model->id_departmen = $department;
        $model->id_section = $section;
        $model->id_document = $document;
        if($model->save()){
            return [
                'status'=>'successshare'
            ];
        }else{
            return [
                'status'=>'fail'
            ];
        }
    }
    public function actionRemoveshare($section,$department,$document){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = DepartmentDocument::findOne(['id_departmen' => $department, 'id_document' => $document,'id_section'=>$section]);
        if($model->delete()){
            return [
                'status'=>'successremoveshare'
            ];
        }else{
            return [
                'status'=>'fail'
            ];
        }
    }
    /**
     * Deletes an existing Document model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Document model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Document the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Document::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
