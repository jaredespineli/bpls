<?php

namespace app\controllers;

use Yii;
use app\models\Approval;
use app\models\ApprovalSearch;
use app\models\Payment;
use app\models\PaymentSearch;
use app\models\Assessment;
use app\models\AssessmentSearch;
use app\models\Business;
use app\models\BusinessSearch;
use app\models\Document;
use app\models\DocumentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ApprovalController implements the CRUD actions for Approval model.
 */
class ApprovalController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $this->layout = 'admin';
        $searchModel = new ApprovalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Approval model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout = 'admin';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Approval model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'admin';
        $model = new Approval();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->approval_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Approval model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
    	$this->layout = 'admin';

        $model = $this->findModel($id);

    }

    /**
     * Deletes an existing Approval model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->layout = 'admin';
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionStatus($id){
    	$this->layout = 'admin';

        $modelBusiness =  Business::find()
        		->where(['business_id' => $id])
                ->one();

        $modelAssess =  Assessment::find()
                ->where(['business_id' => $modelBusiness->business_id])
                ->one();                

        $modelPayment =  Payment::find()
                ->where(['and', ['assessment_id' => $modelAssess->assessment_id], ['payment_quarter' => 0]])      
                ->one();

        $modelDoc =  Document::find()
                ->where(['business_id' => $modelBusiness->business_id	])      
                ->one();

        return $this->render('status', [
                'modelBusiness' => $modelBusiness,
                'modelAssess' => $modelAssess,
                'modelPayment' => $modelPayment,
                'modelDoc' => $modelDoc,
            ]);
    }
}