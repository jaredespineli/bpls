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
use app\models\Renewal;
use app\models\RenewalSearch;
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

        //get all approval
        $modelApproval =  Yii::$app->db->createCommand('SELECT * from approval')
            ->queryAll();

        for($i = 0; $i < sizeof($modelApproval); $i++){
            $approve = Approval::find()
                ->where(['approval_id' => $modelApproval[$i]["approval_id"]])
                ->one();

            $modelBusiness = Business::find()
                ->where(['business_id' => $approve->business_id])
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

            if((trim($modelDoc->document_status, " ") == 'Approved') && (!(is_null($modelPayment))) && (!(is_null($modelPayment->payment_kind)))){
                $approve->approval_status = "Approved";
            }

            $approve->save();
        }

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
     * Creates a new Approval model.
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

    }

    /**
     * Deletes an existing Approval model.
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

    public function actionStatus($id)
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

        $modelBusiness =  Business::find()
                ->where(['business_id' => $model->business_id])
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
                'model' => $model,
                'modelBusiness' => $modelBusiness,
                'modelAssess' => $modelAssess,
                'modelPayment' => $modelPayment,
                'modelDoc' => $modelDoc,
            ]);
    }

    /**
     * Finds the Approval model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Approval the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Approval::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}