<?php

namespace app\controllers;

use Yii;
use app\models\Payment;
use app\models\PaymentSearch;
use app\models\Assessment;
use app\models\AssessmentSearch;
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
            //$model->payment_status = 'Paid';\

            
             if(trim($model->payment_kind, " ") == 'Annually'){
                 $model->payment_status = "Paid";
                 $model->save();
                 return $this->redirect(['annually', 'id' => $model->payment_id]);                 
             }
                elseif(trim($model->payment_kind, " ") == 'Bi-Annually'){
                 $model->payment_status = "Paid";
                 $model->assessed_value = $model->grand_total/2;   
                 $model->save();
                 return $this->redirect(['paymentoptionsbiannually', 'id' => $model->payment_id]);      
                }            
            // return $this->redirect(['view', 'id' => $model->payment_id]);
        } else {
            // var_dump($model);
            return $this->render('update', [
                'model' => $model,
            ]);
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

    // public function actionQuarterly($id)
    // {
    //     $model = $this->findModel($id);

    //     $modelPayment = Payment::find()
    //             ->where(['assessment_id' => $model->assessment_id])
    //             ->all();        

    //     return $this->render('quarterly', [
    //             'model' => $model,
    //             'modelPayment' => $modelPayment,
    //         ]);
    // }

    public function actionAnnually($id)
    {        
        $this->layout = 'admin';
        $modelPayment = $this->findModel($id);  

        return $this->render('annually', [                
                'modelPayment' => $modelPayment,
            ]);
    }

    public function actionBiAnnually($id)
    {        
        $this->layout = 'admin';
        $modelPayment = $this->findModel($id);  

        return $this->render('biannually', [                
                'modelPayment' => $modelPayment,
            ]);
    }

    public function actionPaymentoptionsbiannually($id)
    {        
        $this->layout = 'admin';
        $modelPayment = $this->findModel($id);  

        if ($modelPayment->load(Yii::$app->request->post())) {
            $modelPayment->save();
             return $this->redirect(['biannually', 'id' => $modelPayment->payment_id]);
        }else{
            return $this->render('paymentoptionsbiannually', [                
                'modelPayment' => $modelPayment,
            ]);
        }
        
    }

    // public function actionPaymentoptionsbiannually($id)
    // {        
    //     $this->layout = 'admin';
    //     $modelPayment = $this->findModel($id);  

    //     if ($modelPayment->load(Yii::$app->request->post()) && $modelPayment->save()) {
    //         return $this->redirect(['biannually', 'id' => $modelPayment->payment_id]);
    //     } else {
    //             return $this->render('paymentoptionsbiannually', [
    //                 'modelPayment' => $modelPayment,
    //             ]);
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
