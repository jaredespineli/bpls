<?php

namespace app\controllers;

use Yii;
// use kartik\mpdf\Pdf;
use app\models\Payment;
use app\models\PaymentSearch;
use app\models\Assessment;
use app\models\AssessmentSearch;
use app\models\Business;
use app\models\BusinessSearch;
use yii\web\Controller;
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
        $this->layout = 'admin';
        $searchModel = new PaymentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
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
        $this->layout = 'admin';
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
        $this->layout = 'admin';
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
        $this->layout = 'admin';

        $model = $this->findModel($id);

        if(is_null($model->payment_kind)){
            if($model->load(Yii::$app->request->post())){
                $model->save();

                if(trim($model->payment_kind, " ") == 'Annually'){
                    $model->assessed_value = $model->grand_total;             
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
                        $modelPayment->save();
                    } 
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
                    $modelPayment->save();   
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
        $this->layout = 'admin';
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionPaytable($id)
    {                
        $this->layout = 'admin';
        $model = $this->findModel($id);  
        
        //yung 4 na payment with same assessment_id
        $modelPayment = Payment::find()
            ->where(['assessment_id' => $model->assessment_id])
            ->orderBy(['payment_quarter' => SORT_ASC])
            ->all();

        if(trim($modelPayment[0]["payment_kind"], " ") == 'Annually'){
            $modelPayment[0]["assessed_value"] = $modelPayment[0]["grand_total"];
        }else if(trim($modelPayment[0]["payment_kind"], " ") == 'Bi-Annually'){
            $modelPayment[0]["assessed_value"] = $modelPayment[0]["grand_total"]/2;
        }else if(trim($modelPayment[0]["payment_kind"], " ") == 'Quarterly'){
            $modelPayment[0]["assessed_value"] = $modelPayment[0]["grand_total"]/4;
        }

        return $this->render('paytable', ['modelPayment' => $modelPayment]);                                          
    }

    public function actionPaypermit($id)
    {
        $this->layout = 'admin';

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())){
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

    // public function actionOfficialreceipt($id){
    //     $model = $this->findModel($id);

    //     $pdf = $this->renderPartial('officialreceipt', [
    //          'model' => $model,
    //     ]);

    //     $pdf = new Pdf([
    //     // set to use core fonts only
    //     'mode' => Pdf::MODE_CORE, 
    //     // A4 paper format
    //     'format' => Pdf::FORMAT_A4, 
    //     // portrait orientation
    //     'orientation' => Pdf::ORIENT_PORTRAIT, 
    //     // stream to browser inline
    //     'destination' => Pdf::DEST_BROWSER, 
    //     // your html content input
    //     'content' => $content,  
    //     // format content from your own css file if needed or use the
    //     // enhanced bootstrap css built by Krajee for mPDF formatting 
    //     'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
    //     // any css to be embedded if required
    //     'cssInline' => '.kv-heading-1{font-size:18px}', 
    //      // set mPDF properties on the fly
    //     'options' => ['title' => 'Krajee Report Title'],
    //      // call mPDF methods on the fly
    //     'methods' => [ 
    //         'SetHeader'=>['Krajee Report Header'], 
    //         'SetFooter'=>['{PAGENO}'],
    //     ]
    // ]);

    //     // $pdf = new Pdf([ 
    //     //     'orientation' => Pdf::ORIENT_PORTRAIT,
    //     //     'format' => Pdf::FORMAT_A4, 
    //     // ]);
    
    //     // $pdf->content = $this->renderPartial('officialreceipt', [
    //     //     'model' => $model,
    //     // ]);

    //     return $pdf->render();

    // }


    // public function actionPayment($id)
    // {
    //     $model = $this->findModel($id);

    //     $modelPayment = Property::find()
    //             ->where(['business_id' => $model->business_id])
    //             ->all();

    //     $modelOwner = Owner::find()
    //             ->where(['business_id' => $model->business_id])
    //             ->all();
    // }


    // public function actionAnnually($id)
    // {        
    //     $this->layout = 'admin';
        
    //     $modelPayment = $this->findModel($id); 

    //     return $this->render('annually', [                
    //             'modelPayment' => $modelPayment,                
    //         ]);
    // }

    // public function actionQuarterly($id)
    // {                
    //     $this->layout = 'admin';
    //     $modelPayment = $this->findModel($id);  
    //     $quarter_assessment = $modelPayment->grand_total/4;
    //     $prevQuarter = $modelPayment->payment_quarter;
    //     $arrayQuarter = array();
       
    //         if(is_null($modelPayment->payment_quarter)){
    //             //throw new NotFoundHttpException('Please make sure to choose a quarter to pay for.');
    //             for($i=0; $i<4; $i++){
    //                 $arrayQuarter[$i]["payment_status"] = 'Unpaid'; 
    //                 $arrayQuarter[$i]["quarter_assessment"] = $quarter_assessment;     
    //                 $arrayQuarter[$i]["payment_quarter"] = $i+1; 
    //             }

    //             return $this->render('quarterly', ['modelPayment' => $modelPayment, 'arrayQuarter' => $arrayQuarter]); 
    //         }
                  
    //             else{                      
    //                     $arrayQuarter =  array();

    //                        for($i=0; $i<$modelPayment->payment_quarter; $i++){
    //                             $arrayQuarter[$i]["payment_status"] = 'Paid';
    //                             $arrayQuarter[$i]["quarter_assessment"] = $quarter_assessment;
    //                             $arrayQuarter[$i]["payment_quarter"] = $i+1;
    //                             }
                               
    //                         for($i=$modelPayment->payment_quarter; $i<4; $i++){
    //                             $arrayQuarter[$i]["payment_status"] = 'Unpaid';
    //                             $arrayQuarter[$i]["quarter_assessment"] = $quarter_assessment;
    //                             $arrayQuarter[$i]["payment_quarter"] = $i+1;
    //                         } 
                                
    //                         if($modelPayment->payment_quarter == 4){    
    //                             $modelPayment->payment_status = 'Paid';
    //                         }

    //                             $modelPayment->save(); 

    //                             return $this->render('quarterly', ['modelPayment' => $modelPayment, 'arrayQuarter' => $arrayQuarter]); 
    //                         }                                           
    // }

    // public function actionBiannually($id)
    // {        
    //     $this->layout = 'admin';

    //     $modelPayment = $this->findModel($id);
    //     $arrayHalf = array();

    //     return $this->render('biannually', [                
    //             'modelPayment' => $modelPayment,
    //             'arrayHalf' => $arrayHalf,
    //         ]);
    // }

    // public function actionPayoptionan($id){
    //     $this->layout = 'admin';
    //     $modelPayment = $this->findModel($id);  
    //     $annually_assessment = $modelPayment->grand_total; 

    //     return $this->render('annually', ['modelPayment' => $modelPayment]);       
    // }

    // public function actionPayoptionqu($id){
    //    $this->layout = 'admin';
    //    $modelPayment = $this->findModel($id);
    //    $quarter_assessment = $modelPayment->grand_total/4;
    //    $arrayQuarter = array();

    //    for($i=1; $i<5; $i++){
    //         if($i==$modelPayment->payment_quarter+1 && $modelPayment->payment_quarter != 4 ){                
    //             $arrayQuarter[$i]["quarter_assessment"] = $quarter_assessment;     
    //             $arrayQuarter[$i]["payment_quarter"] = $i; 
    //         }        
    //    }

    //    if ($modelPayment->load(Yii::$app->request->post())){
    //        // $modelPayment->payment_status = 'Paid';
    //        $modelPayment->save();

    //        return $this->redirect(['quarterly', 'id' => $modelPayment->payment_id]); 

    //    }

    //    return $this->render('payoptionqu', ['modelPayment' => $modelPayment, 'arrayQuarter' => $arrayQuarter]);
    // }


    // public function actionPayoptionbi($id)
    // {        
    //     $this->layout = 'admin';
    //     $modelPayment = $this->findModel($id);
    //     $biannually_assessment = $modelPayment->grand_total/2;
    //     $prevHalf = $modelPayment->payment_bi_annually;
    //     $arrayHalf = array();  

    //     if ($modelPayment->load(Yii::$app->request->post())) {        
    //         //$modelPayment->save();
    //             if(is_null($modelPayment->payment_bi_annually)){
    //                 throw new NotFoundHttpException('Please make sure to choose a which half to pay for.');
    //             }
    //                 else{
    //                     if(is_null($prevHalf)){
    //                         echo "hello";
    //                         for($i=0; $i<$modelPayment->payment_bi_annually; $i++){
    //                             $arrayHalf[$i]["payment_status"] = 'Paid';
    //                             $arrayHalf[$i]["biannually_assessment"] = $biannually_assessment;
    //                             $arrayHalf[$i]["payment_bi_annually"] = $i+1;

    //                         }                            
    //                             if($modelPayment->payment_bi_annually == 2){    
    //                                 $modelPayment->payment_status = 'Paid';
    //                             } 

    //                         $modelPayment->save(); 

    //                         return $this->render('biannually', ['modelPayment' => $modelPayment, 'arrayHalf' => $arrayHalf]);      
    //                         // return $this->redirect('biannually');      
    //                     }else{
    //                         if($prevHalf < $modelPayment->payment_bi_annually){
    //                             $arrayQuarter =  array();

    //                             for($i=0; $i<$modelPayment->payment_bi_annually; $i++){
    //                                 $arrayHalf[$i]["payment_status"] = 'Paid';
    //                                 $arrayHalf[$i]["biannually_assessment"] = $biannually_assessment;
    //                                 $arrayHalf[$i]["payment_bi_annually"] = $i+1;
    //                             }                                
    //                                 if($modelPayment->payment_bi_annually == 2){    
    //                                     $modelPayment->payment_status = 'Paid';
    //                                 }

    //                             $modelPayment->save(); 

    //                             return $this->render('biannually', ['modelPayment' => $modelPayment, 'arrayHalf' => $arrayHalf]); 
    //                         }else{
    //                             return $this->render('payoptionbi', ['modelPayment' => $modelPayment]);                            
    //                         }     
    //                     }
    //                 }
    //                 return $this->render('payoptionbi', ['modelPayment' => $modelPayment]);
    //      } else {
    //         return $this->render('payoptionbi', ['modelPayment' => $modelPayment]);  
    //     }  
    // }

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
