<?php

namespace app\controllers;

use Yii;
use app\models\Assessment;
use app\models\AssessmentSearch;
use app\models\Payment;
use app\models\PaymentSearch;
use app\models\Business;
use app\models\BusinessSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AssessmentController implements the CRUD actions for Assessment model.
 */
class AssessmentController extends Controller
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
     * Lists all Assessment models.
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
            }else if ($user_type === 'BPLO'){
                $this->layout = 'bplo';
            }      
        
        $searchModel = new AssessmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 5; 

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Assessment model.
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
            }else if ($user_type === 'BPLO'){
                $this->layout = 'bplo';
            }      

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Assessment model.
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
            }else if ($user_type === 'BPLO'){
                $this->layout = 'bplo';
            }      

        $model = new Assessment();
        $model = $this->findModel($id);
        
        // $modelBusiness = Business::find()
        //     ->where(['business_id' => $model->business_id])


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->assessment_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Assessment model.
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
            }else if ($user_type === 'BPLO'){
                $this->layout = 'bplo';
            }      

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->grand_total = $model->gross_sales_tax_amt + $model->gross_sales_tax_pnl + $model->transport_truck_tax_amt + $model->transport_truck_tax_pnl + $model->hazard_storage_tax_amt + $model->hazard_storage_tax_pnl + $model->sign_billboard_tax_amt + $model->sign_billboard_tax_pnl + $model->mayors_permit_fee_amt + $model->mayors_permit_fee_pnl + $model->garbage_fee_amt + $model->garbage_fee_pnl + $model->truck_van_permit_fee_amt + $model->truck_van_permit_fee_pnl + $model->sanitary_permit_fee_amt + $model->sanitary_permit_fee_pnl + $model->bldg_insp_fee_amt + $model->bldg_insp_fee_pnl + $model->elec_insp_fee_amt + $model->elec_insp_fee_pnl +$model->mech_insp_fee_amt + $model->mech_insp_fee_pnl + $model->plumb_insp_fee_amt + $model->plumb_insp_fee_pnl + $model->sign_billboard_fee_amt + $model->sign_billboard_fee_pnl + $model->sign_billboard_renew_fee_amt + $model->sign_billboard_renew_fee_pnl + $model->hazard_storage_fee_amt + $model->hazard_storage_fee_pnl + $model->bfp_fee_amt + $model->bfp_fee_pnl + $model->business_tax + $model->environmental_fee + $model->business_plate + $model->liquor + $model->tobacco + $model->health_card + $model->medical_fee;
            $model->save();

            $model_payment_unpaid =  Payment::find()
                ->where(['and', ['assessment_id' => $model->assessment_id], ['payment_status_per' => 'Pending']])
                ->all();

            $model_payment_paid =  Payment::find()
                ->where(['and', ['assessment_id' => $model->assessment_id], ['payment_status_per' => 'Paid']])
                ->all();

            if(sizeof($model_payment_unpaid) == 0){

                $model_pay = new Payment(); //all created payment will have default payment status of unpaid
                $model_pay->assessment_id = $model->assessment_id;
                $model_pay->business_name = $model->business_name;
                $model_pay->president_name = $model->president_name;
                $model_pay->grand_total = $model->grand_total;  
                $model_pay->payment_quarter = 0;                                                
                $model_pay->payment_status = 'Pending';
                $model_pay->payment_status_per = 'Pending';
                $model_pay->save();                

            }

            else {
                if(is_null($model_payment_paid)){
                    $assessed_value = $model->grand_total / sizeof($model_payment_unpaid);
                }else{
                    $paid_amount = 0;

                    for($i = 0; $i < sizeof($model_payment_paid); $i++){
                        $paid_amount = $paid_amount + $model_payment_paid[$i]["assessed_value"];
                    }
                    
                    $assessed_value = ($model->grand_total - $paid_amount)/ sizeof($model_payment_unpaid);
                }

                for($i = 0; $i < sizeof($model_payment_unpaid); $i++){
                    $model_payment_unpaid[$i]["grand_total"] = $model->grand_total;
                    $model_payment_unpaid[$i]["assessed_value"] = $assessed_value;
                    $model_payment_unpaid[$i]->save();
                }
            }

            return $this->redirect(['view', 'id' => $model->assessment_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Assessment model.
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
            }else if ($user_type === 'BPLO'){
                $this->layout = 'bplo';
            }      

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Assessment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Assessment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Assessment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
