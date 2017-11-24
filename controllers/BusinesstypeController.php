<?php

namespace app\controllers;

use Yii;
use app\models\Businesstype;
use app\models\BusinesstypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BusinesstypeController implements the CRUD actions for Businesstype model.
 */
class BusinesstypeController extends Controller
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
     * Lists all Businesstype models.
     * @return mixed
     */
    public function actionIndex()
    {
        $user_type = trim(Yii::$app->user->identity->user_type, " ");

            if($user_type == 'Admin'){
                $this->layout = 'admin';                
            }else if($user_type === 'Assessor'){
                $this->layout = 'assessor';
            }else if($user_type === 'Treasurer'){
                $this->layout = 'treasurer';
            }else if ($user_type === 'Taxpayer'){
                $this->layout = 'taxpayer';
            }

        $searchModel = new BusinesstypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Businesstype model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $user_type = trim(Yii::$app->user->identity->user_type, " ");

            if($user_type == 'Admin'){
                $this->layout = 'admin';                
            }else if($user_type === 'Assessor'){
                $this->layout = 'assessor';
            }else if($user_type === 'Treasurer'){
                $this->layout = 'treasurer';
            }else if ($user_type === 'Taxpayer'){
                $this->layout = 'taxpayer';
            }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Businesstype model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $user_type = trim(Yii::$app->user->identity->user_type, " ");

            if($user_type == 'Admin'){
                $this->layout = 'admin';                
            }else if($user_type === 'Assessor'){
                $this->layout = 'assessor';
            }else if($user_type === 'Treasurer'){
                $this->layout = 'treasurer';
            }else if ($user_type === 'Taxpayer'){
                $this->layout = 'taxpayer';
            }

        $model = new Businesstype();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->businesstype_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Businesstype model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $user_type = trim(Yii::$app->user->identity->user_type, " ");

            if($user_type == 'Admin'){
                $this->layout = 'admin';                
            }else if($user_type === 'Assessor'){
                $this->layout = 'assessor';
            }else if($user_type === 'Treasurer'){
                $this->layout = 'treasurer';
            }else if ($user_type === 'Taxpayer'){
                $this->layout = 'taxpayer';
            }

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->businesstype_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Businesstype model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $user_type = trim(Yii::$app->user->identity->user_type, " ");

            if($user_type == 'Admin'){
                $this->layout = 'admin';                
            }else if($user_type === 'Assessor'){
                $this->layout = 'assessor';
            }else if($user_type === 'Treasurer'){
                $this->layout = 'treasurer';
            }else if ($user_type === 'Taxpayer'){
                $this->layout = 'taxpayer';
            }
        
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Businesstype model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Businesstype the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Businesstype::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
