<?php

namespace backend\controllers;

use Yii;
use common\models\UserDepartment;
use common\models\Department;
use common\models\UserDepartmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Profile;
use common\models\ProfileSearch;
use yii\helpers\ArrayHelper;

/**
 * UserdepartmentController implements the CRUD actions for UserDepartment model.
 */
class UserdepartmentController extends Controller
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
     * Lists all UserDepartment models.
     * @return mixed
     */
    
    public function actionIndex()
    {
        $searchModel = new ProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDepartment($id)
    {
        $profile = Profile::findOne($id);
        if(isset($profile->user->userDepartment->department->id)){
           $model =  $this->findModel($id, $profile->user->userDepartment->department->id);
        }
        else{
            $model = New UserDepartment;
            $model->id_user = $id;
        }
        if($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
        }
        $departments = Department::find()->where(['active'=>'1'])->all();
        return $this->render('setDepartment', [
                'departments'=>ArrayHelper::map($departments,'id','name'),
                'model' => $model,
                'profile' => $profile,
            ]);
    }
    /**
     * Displays a single UserDepartment model.
     * @param integer $id_user
     * @param integer $id_department
     * @return mixed
     */
    public function actionView($id_user, $id_department)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_user, $id_department),
        ]);
    }

    /**
     * Updates an existing UserDepartment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_user
     * @param integer $id_department
     * @return mixed
     */
    public function actionUpdate($id_user, $id_department)
    {
        $model = $this->findModel($id_user, $id_department);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_user' => $model->id_user, 'id_department' => $model->id_department]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UserDepartment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_user
     * @param integer $id_department
     * @return mixed
     */
    public function actionDelete($id_user, $id_department)
    {
        $this->findModel($id_user, $id_department)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserDepartment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_user
     * @param integer $id_department
     * @return UserDepartment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_user, $id_department)
    {
        if (($model = UserDepartment::findOne(['id_user' => $id_user, 'id_department' => $id_department])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
