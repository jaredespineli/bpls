<?php

namespace app\controllers;

use Yii;
use app\models\Renewal;
use app\models\RenewalSearch;
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
 * RenewalController implements the CRUD actions for Renewal model.
 */
class RenewalController extends Controller
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
     * Lists all Renewal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'admin';
        $searchModel = new RenewalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Renewal model.
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
     * Creates a new Renewal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Renewal();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->renewal_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Renewal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->renewal_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Renewal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionRenewalstatus($id){
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
                ->where(['business_id' => $modelBusiness->business_id   ])      
                ->one();

        return $this->render('renewalstatus', [
                'modelBusiness' => $modelBusiness,
                'modelAssess' => $modelAssess,
                'modelPayment' => $modelPayment,
                'modelDoc' => $modelDoc,
            ]);
    }

    /**
     * Finds the Renewal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Renewal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Renewal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
