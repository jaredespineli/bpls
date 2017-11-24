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

        //get all data of renewal
        $modelRenewal =  Yii::$app->db->createCommand('SELECT * from renewal')
            ->queryAll();

        
        //check system date, compare sa date now -- if lagpas na sa now, inactive else active
        //sa loob ng for loop kukunin yung katumbas na approval ng renewal gamit ang business_id
        for($i = 0; $i < sizeof($modelRenewal); $i++){
            $renewal = Renewal::find()
                    ->where(['renewal_id' => $modelRenewal[$i]["renewal_id"]])      
                    ->one(); 

            if(trim($renewal->business_status, " ") == 'Inactive'){ //not sure
                $modelApproval = Approval::find()
                ->where(['business_id' => $renewal["business_id"]])      
                ->one();    
            
                date_default_timezone_set('Asia/Manila');
                $yearnow = date('Y'); 

                //compare
                $modelBusiness = Business::find()
                    ->where(['business_id' => $renewal["business_id"]])      
                    ->one();
                    
                if($modelApproval->next_renewal_date < $yearnow){
                    $modelBusiness->isActive = 0;
                    $modelBusiness->save();   
                    $renewal->business_status = "Inactive";
                    $renewal->renewal_status = "Pending";
                    $renewal->save();  

                }else{
                    $modelBusiness->isActive = 1;
                    $modelBusiness->save();
                    $renewal->business_status = "Active";
                    $renewal->renewal_status = "Approved";     
                    $renewal->save();                                                             
                }
            }
        }

        $searchModel = new RenewalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 5; 

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
     * Creates a new Renewal model.
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

    public function actionRenewalstatus($id)
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

        $model = Renewal::find()
                ->where(['business_id' => $id])
                ->one();

        $modelBusiness =  Business::find()
                ->where(['business_id' => $id])
                ->one();

        if ($model->load(Yii::$app->request->post())) {
            $model = Renewal::find()
                ->where(['business_id' => $id])
                ->one();

            $modelBusiness =  Business::find()
                ->where(['business_id' => $model->business_id])
                ->one();

            // $modelBusiness->isActive = 1;
            // $modelBusiness->save();
            $model->business_status = "Active";
            $model->renewal_status = "Approved";
            $model->save();
        }

        $modelAssess =  Assessment::find()
                ->where(['business_id' => $modelBusiness->business_id])
                ->one();                

        $modelPayment =  Payment::find()
                ->where(['and', ['assessment_id' => $modelAssess->assessment_id], ['payment_quarter' => 0]])      
                ->one();

        $modelDoc =  Document::find()
                ->where(['business_id' => $modelBusiness->business_id   ])      
                ->one();

        $modelApproval = Approval::find()
                ->where(['business_id' => $modelBusiness->business_id])
                ->one();

        return $this->render('renewalstatus', [
                'model' => $model,
                'modelBusiness' => $modelBusiness,
                'modelAssess' => $modelAssess,
                'modelPayment' => $modelPayment,
                'modelDoc' => $modelDoc,
                'modelApproval' => $modelApproval,
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
