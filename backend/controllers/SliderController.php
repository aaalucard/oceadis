<?php

namespace backend\controllers;

use Yii;
use common\models\Slider;
use common\models\SliderSearch;
use common\models\SliderITems;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SliderController implements the CRUD actions for Slider model.
 */
class SliderController extends Controller
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
     * Lists all Slider models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SliderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Slider model.
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
     * Creates a new Slider model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Slider();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Slider model.
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
     * Deletes an existing Slider model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionItems($id)
    {
        $model = $this->findModel($id);
        $modelItems = New SliderItems();
        $modelItems->id_slider = $model->id;
        $modelItems->transition = 'zoomout';
        $modelItems->slotamount = 'default';
        $modelItems->hideafterloop= '0';
        $modelItems->hideslideonmobile = 'off';
        $modelItems->easein = 'Power4.easeInOut';
        $modelItems->easeout= 'Power4.easeInOut';
        $modelItems->masterspeed = '2000';
        $modelItems->rotate= '0';
        $modelItems->fstransition= 'fade';
        $modelItems->fsmasterspeed = '1500';
        $modelItems->fsslotamount='7';
        $modelItems->saveperformance='off';
        //$modelItems->tittle='';
        $modelItems->description='';
        $modelItems->bgposition = 'center center';
        $modelItems->bgfit = 'cover';
        $modelItems->bgrepeat = 'no-repeat';
        $modelItems->paralax = '10';


        if ($modelItems->load(Yii::$app->request->post())) {
            $image = $modelItems->uploadImage();
            if ($image !== false) { // delete old & overwrite - && unlink($oldFile)
                    $path = "/slider/".$modelItems->id_slider."/".$modelItems->image;
                    if($image->saveAs(dirname(dirname(__DIR__)).$path)){
                        $modelItems->save();
                        return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }
        // var_dump($modelItems->errors);die();
        return $this->render('items', [
            'modelItems' => $modelItems,
        ]);
    }
    /**
     * Finds the Slider model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Slider the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Slider::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
