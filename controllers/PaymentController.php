<?php

namespace app\controllers;

use Yii;
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

        if ($model->load(Yii::$app->request->post())) {
            
             if(trim($model->payment_kind, " ") == 'Annually'){
                 $model->payment_status = "Paid";
                 $model->save();
                 return $this->redirect(['annually', 'id' => $model->payment_id]);                 
             }                
                elseif(trim($model->payment_kind, " ") == 'Quarterly'){
                    $model->save();
                    return $this->redirect(['payoptionqu', 'id' => $model->payment_id]); 
                }
                elseif(trim($model->payment_kind, " ") == 'Bi-Annually'){
                    $model->save();
                    return $this->redirect(['payoptionbi', 'id' => $model->payment_id]); 
                }
                    else{
                        echo "hello";
                    }                       
        } else {
            // var_dump($model);
            return $this->render('update', ['model' => $model]);
        }
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

    public function actionPayment($id)
    {
        $model = $this->findModel($id);

        $modelPayment = Property::find()
                ->where(['business_id' => $model->business_id])
                ->all();

        $modelOwner = Owner::find()
                ->where(['business_id' => $model->business_id])
                ->all();
    }


    public function actionAnnually($id)
    {        
        $this->layout = 'admin';
        
        $modelPayment = $this->findModel($id); 

        return $this->render('annually', [                
                'modelPayment' => $modelPayment,                
            ]);
    }

    public function actionQuarterly($id)
    {        
        $this->layout = 'admin';

        $modelPayment = $this->findModel($id);
        $arrayQuarter = array();

        return $this->render('quarterly', [                
                'modelPayment' => $modelPayment,
                'arrayQuarter' => $arrayQuarter,
            ]);
    }

    public function actionBiannually($id)
    {        
        $this->layout = 'admin';

        $modelPayment = $this->findModel($id);
        $arrayHalf = array();

        return $this->render('biannually', [                
                'modelPayment' => $modelPayment,
                'arrayHalf' => $arrayHalf,
            ]);
    }

    public function actionPayoptionan($id){
        $this->layout = 'admin';
        $modelPayment = $this->findModel($id);  
        $annually_assessment = $modelPayment->grand_total; 

        return $this->render('annually', ['modelPayment' => $modelPayment]);       
    }

    public function actionPayoptionqu($id){
        $this->layout = 'admin';
        $modelPayment = $this->findModel($id);  
        $quarter_assessment = $modelPayment->grand_total/4;
        $prevQuarter = $modelPayment->payment_quarter;
        $arrayQuarter = array();

         if ($modelPayment->load(Yii::$app->request->post())) {        
            //$modelPayment->save();
                if(is_null($modelPayment->payment_quarter)){
                    throw new NotFoundHttpException('Please make sure to choose a quarter to pay for.');
                }
                    else{
                        if(is_null($prevQuarter)){
                            for($i=0; $i<$modelPayment->payment_quarter; $i++){
                                $arrayQuarter[$i]["payment_status"] = 'Paid';
                                $arrayQuarter[$i]["quarter_assessment"] = $quarter_assessment;
                                $arrayQuarter[$i]["payment_quarter"] = $i+1;

                            }
                            for($i=$modelPayment->payment_quarter; $i<4; $i++){
                                $arrayQuarter[$i]["payment_status"] = 'Unpaid'; 
                                $arrayQuarter[$i]["quarter_assessment"] = $quarter_assessment;    
                                $arrayQuarter[$i]["payment_quarter"] = $i+1; 
                            }

                                if($modelPayment->payment_quarter == 4){    
                                    $modelPayment->payment_status = 'Paid';
                                } 

                            $modelPayment->save(); 

                            return $this->render('quarterly', ['modelPayment' => $modelPayment, 'arrayQuarter' => $arrayQuarter]);      
                        }else{
                            if($prevQuarter < $modelPayment->payment_quarter){
                                $arrayQuarter =  array();

                                for($i=0; $i<$modelPayment->payment_quarter; $i++){
                                    $arrayQuarter[$i]["payment_status"] = 'Paid';
                                    $arrayQuarter[$i]["quarter_assessment"] = $quarter_assessment;
                                    $arrayQuarter[$i]["payment_quarter"] = $i+1;
                                }
                                for($i=$modelPayment->payment_quarter; $i<4; $i++){
                                    $arrayQuarter[$i]["payment_status"] = 'Unpaid';
                                    $arrayQuarter[$i]["quarter_assessment"] = $quarter_assessment;
                                    $arrayQuarter[$i]["payment_quarter"] = $i+1;
                                } 
                                    if($modelPayment->payment_quarter == 4){    
                                        $modelPayment->payment_status = 'Paid';
                                    }

                                $modelPayment->save(); 

                                return $this->render('quarterly', ['modelPayment' => $modelPayment, 'arrayQuarter' => $arrayQuarter]); 
                            }else{
                                return $this->render('payoptionqu', ['modelPayment' => $modelPayment]);                            
                            }     
                        }
                    }
                    return $this->render('payoptionqu', ['modelPayment' => $modelPayment]);
         } else {
            return $this->render('payoptionqu', ['modelPayment' => $modelPayment]);  
         }
    }


    public function actionPayoptionbi($id)
    {        
        $this->layout = 'admin';
        $modelPayment = $this->findModel($id);
        $biannually_assessment = $modelPayment->grand_total/2;
        $prevHalf = $modelPayment->payment_bi_annually;
        $arrayHalf = array();  

        if ($modelPayment->load(Yii::$app->request->post())) {        
            //$modelPayment->save();
                if(is_null($modelPayment->payment_bi_annually)){
                    throw new NotFoundHttpException('Please make sure to choose a which half to pay for.');
                }
                    else{
                        if(is_null($prevHalf)){
                            echo "hello";
                            for($i=0; $i<$modelPayment->payment_bi_annually; $i++){
                                $arrayHalf[$i]["payment_status"] = 'Paid';
                                $arrayHalf[$i]["biannually_assessment"] = $biannually_assessment;
                                $arrayHalf[$i]["payment_bi_annually"] = $i+1;

                            }                            
                                if($modelPayment->payment_bi_annually == 2){    
                                    $modelPayment->payment_status = 'Paid';
                                } 

                            $modelPayment->save(); 

                            return $this->render('biannually', ['modelPayment' => $modelPayment, 'arrayHalf' => $arrayHalf]);      
                            // return $this->redirect('biannually');      
                        }else{
                            if($prevHalf < $modelPayment->payment_bi_annually){
                                $arrayQuarter =  array();

                                for($i=0; $i<$modelPayment->payment_bi_annually; $i++){
                                    $arrayHalf[$i]["payment_status"] = 'Paid';
                                    $arrayHalf[$i]["biannually_assessment"] = $biannually_assessment;
                                    $arrayHalf[$i]["payment_bi_annually"] = $i+1;
                                }                                
                                    if($modelPayment->payment_bi_annually == 2){    
                                        $modelPayment->payment_status = 'Paid';
                                    }

                                $modelPayment->save(); 

                                return $this->render('biannually', ['modelPayment' => $modelPayment, 'arrayHalf' => $arrayHalf]); 
                            }else{
                                return $this->render('payoptionbi', ['modelPayment' => $modelPayment]);                            
                            }     
                        }
                    }
                    return $this->render('payoptionbi', ['modelPayment' => $modelPayment]);
         } else {
            return $this->render('payoptionbi', ['modelPayment' => $modelPayment]);  
        }  
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
