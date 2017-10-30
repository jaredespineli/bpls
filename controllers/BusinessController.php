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
        $this->layout = 'admin';
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
        $this->layout = 'admin';
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
        $this->layout = 'admin';
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
            $modelDoc->barangay_clearance = "Disapproved";
            $modelDoc->zoning_clearance = "Disapproved";
            $modelDoc->sanitary_clearance = "Disapproved";
            $modelDoc->occupancy_permit = "Disapproved";
            $modelDoc->fire_safety = "Disapproved";
            $modelDoc->save();


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
        $this->layout = 'admin';
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
        $this->layout = 'admin';
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
    * Use for document verification
    */
    public function actionVerify(){
        $this->layout = 'admin';         

        //get all business
        $modelVerify =  Yii::$app->db->createCommand('SELECT * from business')
            ->queryAll();


        //update document_status
        for($i = 0; $i < sizeof($modelVerify); $i++ ){
            $doc = Document::find()
                ->where(['business_id' => $modelVerify[$i]["business_id"]])
                ->one();

            if(trim($doc->barangay_clearance, " ") == "Approved" && trim($doc->zoning_clearance, " ") == "Approved" && trim($doc->sanitary_clearance, " ") == "Approved" && trim($doc->occupancy_permit, " ") == "Approved" && trim($doc->fire_safety, " ") == "Approved"){
                $doc->document_status = "Approved" ;
            }else{
                $doc->document_status = "Disapproved" ;
            }
            $doc->save();
        }

        return $this->render('verify', [                
            'modelVerify' => $modelVerify   
        ]); 
    }

    public function actionVerifydoc($id){
        $this->layout = 'admin'; 

        $modelVerify = Document::find()
            ->where(['document_id' => $id])
            ->one();

        return $this->render('verifydoc', [
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
