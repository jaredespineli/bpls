<?php

namespace app\controllers;

use Yii;
use app\models\Business;
use app\models\BusinessSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Assessment;
use app\models\Document;
use app\models\Approval;
use app\models\Renewal;

/**
 * BusinessController implements the CRUD actions for Business model.
 */
class BusinessController extends Controller
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
     * Lists all Business models.
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

        $searchModel = new BusinessSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Business model.
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
     * Creates a new Business model.
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

        $model = new Business();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $modelAssess = new Assessment();
            $modelAssess->business_id = $model->business_id;
            $modelAssess->business_name = $model->business_name;
            $modelAssess->capital_amount = $model->capital_amount;
            $modelAssess->president_name = $model->president_name;
            $modelAssess->save();

            $modelDoc = new Document();
            $modelDoc->business_id = $model->business_id;
            $modelDoc->document_status = "Pending";
            $modelDoc->barangay_clearance_status = "Pending";
            $modelDoc->zoning_clearance_status = "Pending";
            $modelDoc->sanitary_clearance_status = "Pending";
            $modelDoc->occupancy_permit_status = "Pending";
            $modelDoc->fire_safety_status = "Pending";
            $modelDoc->save();

            $modelApprove = new Approval();
            $modelApprove->business_id = $model->business_id;  
            $modelApprove->business_name = $model->business_name;            
            $modelApprove->approval_status = "Pending";
            $modelApprove->save();

            $modelRenew = new Renewal();
            $modelRenew->business_id = $model->business_id;  
            $modelRenew->business_name = $model->business_name;            
            $modelRenew->renewal_status = "Pending";
            $modelRenew->save();



            return $this->redirect(['view', 'id' => $model->business_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Business model.
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
            return $this->redirect(['view', 'id' => $model->business_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Business model.
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
    * Use for document verification
    */
    public function actionVerify()
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

        //get all business
        $modelVerify =  Yii::$app->db->createCommand('SELECT * from business')
            ->queryAll();

        return $this->render('verify', [                
            'modelVerify' => $modelVerify   
        ]); 
    }

    public function actionVerifydoc($id)
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

        $modelVerify = Document::find()
            ->where(['document_id' => $id])
            ->one();

        return $this->render('verifydoc', [
            'modelVerify' => $modelVerify
        ]);
    }

    public function actionApprovedoc($id)
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

        $modelVerify = Document::find()
            ->where(['document_id' => $id])
            ->one();

        $barangay_clearance_status = $modelVerify->barangay_clearance_status;
        $zoning_clearance_status = $modelVerify->zoning_clearance_status;
        $sanitary_clearance_status = $modelVerify->sanitary_clearance_status;
        $occupancy_permit_status = $modelVerify->occupancy_permit_status;
        $fire_safety_status = $modelVerify->fire_safety_status;

       if ($modelVerify->load(Yii::$app->request->post())) {            
            if(trim($barangay_clearance_status, " ") == 'Pending' && trim($modelVerify->barangay_clearance_status, " ") == 'Approved'){
                $modelVerify->barangay_clearance_received_by = $modelVerify->received_by;
                $modelVerify->barangay_clearance_date = $modelVerify->date;                 
            }
                if(trim($zoning_clearance_status, " ") == 'Pending' && trim($modelVerify->zoning_clearance_status, " ") == 'Approved'){
                    $modelVerify->zoning_clearance_received_by = $modelVerify->received_by;
                    $modelVerify->zoning_clearance_date = $modelVerify->date;                     
                }
                    if(trim($sanitary_clearance_status, " ") == 'Pending' && trim($modelVerify->sanitary_clearance_status, " ") == 'Approved'){
                        $modelVerify->sanitary_clearance_received_by = $modelVerify->received_by;
                        $modelVerify->sanitary_clearance_date = $modelVerify->date;                         
                    }
                        if(trim($occupancy_permit_status, " ") == 'Pending' && trim($modelVerify->occupancy_permit_status, " ") == 'Approved'){
                            $modelVerify->occupancy_permit_received_by = $modelVerify->received_by;
                            $modelVerify->occupancy_permit_date = $modelVerify->date;                             
                        }
                            if(trim($fire_safety_status, " ") == 'Pending' && trim($modelVerify->fire_safety_status, " ") == 'Approved'){
                                $modelVerify->fire_safety_received_by = $modelVerify->received_by;
                                $modelVerify->fire_safety_date = $modelVerify->date; 
                                
                            }

            //update document_status
        for($i = 0; $i < sizeof($modelVerify); $i++ ){
            // $doc = Document::find()
            //     ->where(['business_id' => $modelVerify[$i]["business_id"]])
            //     ->one();

            if((trim($modelVerify->barangay_clearance_status, " ") == "Approved") && (trim($modelVerify->zoning_clearance_status, " ") == "Approved") && (trim($modelVerify->sanitary_clearance_status, " ") == "Approved") && (trim($modelVerify->occupancy_permit_status, " ") == "Approved") && (trim($modelVerify->fire_safety_status, " ") == "Approved")){
                $modelVerify->document_status = "Approved" ;
            }else{
                $modelVerify->document_status = "Pending" ;
            }
            $modelVerify->save();
        }

            $modelVerify->save();
            return $this->render('verifydoc', [
            'modelVerify' => $modelVerify
        ]);

       } 

        return $this->render('approvedoc', [
            'modelVerify' => $modelVerify
        ]);
    }



    /**
     * Finds the Business model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Business the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Business::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
