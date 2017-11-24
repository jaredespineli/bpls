<?php

namespace app\controllers;

use Yii;
use kartik\mpdf\Pdf;
use app\models\Payment;
use app\models\PaymentSearch;
use app\models\Assessment;
use app\models\AssessmentSearch;
use app\models\Business;
use app\models\BusinessSearch;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\Response;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PaymentController implements the CRUD actions for Payment model.
 */
class PaymentController extends Controller
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
     * Lists all Payment models.
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

        $searchModel = new PaymentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 5; 
        $dataProvider->query->andWhere(['payment_quarter'=> 0]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Payment model.
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
     * Creates a new Payment model.
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

        $model = new Payment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->payment_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Payment model.
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

        if(is_null($model->payment_kind)){
            if($model->load(Yii::$app->request->post())){
                $model->save();

                if(trim($model->payment_kind, " ") == 'Annually'){
                    $model->assessed_value = $model->grand_total; //update assessed_value ng payment_quarter == 0 
                    $model->save();
          
                }                
                else if(trim($model->payment_kind, " ") == 'Quarterly'){
                    //create ng 3 payment with same assessment_id
                    //start ng 1 yung for loop kasi yung model yung 0
                    for($i = 1; $i < 4; $i++){
                        $modelPayment = new Payment();
                        $modelPayment->assessment_id = $model->assessment_id;
                        $modelPayment->business_name = $model->business_name;
                        $modelPayment->grand_total = $model->grand_total;
                        $modelPayment->payment_status = $model->payment_status; // Unpaid
                        $modelPayment->payment_status_per = $model->payment_status_per; // Unpaid
                        $modelPayment->payment_kind = $model->payment_kind; // Quarterly
                        $modelPayment->president_name = $model->president_name;
                        $modelPayment->payment_quarter = $i; //start yung quarter sa 0 //change to payment_num or kahit ano
                        $modelPayment->assessed_value = $model->grand_total/4;
                        $modelPayment->year = $model->year;
                        $modelPayment->save();
                    } 

                    $model->assessed_value = $model->grand_total/4; //update assessed_value ng payment_quarter == 0
                    $model->save();

                }
                else if(trim($model->payment_kind, " ") == 'Bi-Annually'){
                    //create ng 1 payment with same assessment_id
                    //payment_quarter = 1 kasi yung una ay 0
                    $modelPayment = new Payment();
                    $modelPayment->assessment_id = $model->assessment_id;
                    $modelPayment->business_name = $model->business_name;
                    $modelPayment->grand_total = $model->grand_total;
                    $modelPayment->payment_status = $model->payment_status; // Unpaid
                    $modelPayment->payment_status_per = $model->payment_status_per; // Unpaid
                    $modelPayment->payment_kind = $model->payment_kind; // Bi-Annually
                    $modelPayment->president_name = $model->president_name;
                    $modelPayment->payment_quarter = 1; //start yung quarter sa 0
                    $modelPayment->assessed_value = $model->grand_total/2;
                    $modelPayment->year = $model->year;
                    $modelPayment->save(); 

                    $model->assessed_value = $model->grand_total/2; //update assessed_value ng payment_quarter == 0
                    $model->save();  
                }
                else{
                    //insert error message
                    //mali yung na-input na payment_kind
                    return $this->render('update', [
                        'model' => $model,
                    ]);
                }       
            }else{
                //may mali sa _form
                //error message
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }

        return $this->redirect(['paytable', 'id' => $model->payment_id]); 
    }


    /**
     * Deletes an existing Payment model.
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

    public function actionPaytable($id)
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
        
        $modelPayment = Payment::find()
            ->where(['assessment_id' => $model->assessment_id])
            ->orderBy(['payment_quarter' => SORT_ASC])
            ->all();

        return $this->render('paytable', ['modelPayment' => $modelPayment]);                                          
    }

    public function actionPaypermit($id)
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

        if ($model->load(Yii::$app->request->post())){

            $model->officialreceipt = UploadedFile::getInstance($model, 'officialreceipt');
            if(!empty($modelVerify->officialreceipt)){
                $extension = $model->officialreceipt->extension;
                $model->officialreceipt->saveAs('officialreceipt_uploads/' . $model->officialreceipt->baseName . '.' . $model->officialreceipt->extension);                
                $model->officialreceipt = $model->officialreceipt->name;
            }else{

            }
               
            $model->payment_status_per = 'Paid';
            $model->save();

            $modelPayment = Payment::find()
                ->where(['assessment_id' => $model->assessment_id])
                ->orderBy(['payment_quarter' => SORT_ASC])
                ->all();

            if(trim($modelPayment[sizeof($modelPayment)-1]->payment_status_per, " ") == 'Paid'){
                for($i = 0; $i < sizeof($modelPayment); $i++){
                    $modelPayment[$i]["payment_status"] = 'Paid';
                    $modelPayment[$i]->save();
                }
            }

           return $this->redirect(['paytable', 'id' => $model->payment_id]); 
        }

       return $this->render('paypermit', ['model' => $model]);
    }

    public function actionViewofficialreceipt($id){
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

        return $this->render('viewofficialreceipt', ['model' => $model]);
    }
   

    /**
     * Finds the Payment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Payment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Payment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
