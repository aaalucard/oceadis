<?php

namespace backend\controllers;

use Yii;
use common\models\PageSections;
use common\models\PageSectionsSearch;
use common\models\PageSectionImage;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PagesectionsController implements the CRUD actions for PageSections model.
 */
class PagesectionsController extends Controller
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
     * Lists all PageSections models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PageSectionsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PageSections model.
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
     * Creates a new PageSections model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PageSections();

        if ($model->load(Yii::$app->request->post())) {
            $count = PageSections::find()->where('active = 1')->count();
            $model->position = $count + 1;
            if($model->save())
                return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionUploadimage($id){
        $model = $this->findModel($id);
        $modelImage = new PageSectionImage();
        if($modelImage->load(Yii::$app->request->post())){
            $modelImage->id_page_section = $id;
            $image = $modelImage->uploadImage();

            // revert back if no valid file instance uploaded
            $count = PageSectionImage::find()->where('id_page_section='.$id)->count();
            $modelImage->position = $count + 1;
            if($modelImage->validate()){
                if ($image !== false) { // delete old & overwrite - && unlink($oldFile)
                    $path = "/pagesection/".$modelImage->hash."/".$modelImage->dir_name;
                    if($image->saveAs(dirname(dirname(__DIR__)).$path)){
                        $modelImage->save();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
            } 
        }
        return $this->render('uploadImage', [
            'model' => $model,
            'modelImage' => $modelImage,
            'pageSectionImages'=>PageSectionImage::find()->where('id_page_section='.$id)->all(),
        ]);
    }
    /**
     * Updates an existing PageSections model.
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

    /**
     * Deletes an existing PageSections model.
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
     * Finds the PageSections model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PageSections the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PageSections::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
