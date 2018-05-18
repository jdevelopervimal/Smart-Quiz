<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Purchase;
use common\models\Quiz;

class PurchaseController extends Controller
{
    public $enableCsrfValidation = false;

    public function beforeAction($action) {
        if (empty(Yii::$app->user->identity->id)) {
            $this->redirect(BASE_URL);
        } else {
            return TRUE;
        }
    }
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionPurchase($id){
        if(!empty($id)){
        $quiz = Quiz::find()->select('quid,quiz_price,test_type,description')->where(['quid'=>$id])->one();
        return $this->render('purchase',['quiz' => $quiz]);    
        }else{
          return $this->render('404');
        }
        
    }
    public function actionPayu(){
        if(Yii::$app->request->post()){
            $post1 = Yii::$app->request->post();
            $quiz = Quiz::find()->select('quid,quiz_price,test_type,description')->where(['quid'=>$post1['productinfo']])->asArray()->one();
        
            $post['amount'] = number_format($quiz['quiz_price'],2);
            $post['productinfo'] = $quiz['quid'];
            $post['surl'] = BASE_URL.'pausuccess';
            $post['furl'] = BASE_URL.'paufailed';
            $post['key'] = "gtKFFx";
            $post['service_provider'] = "";
            $post['txnid'] = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
            //$ha = 'JBZaLc|'.$post['txnid'].'|'.$post['amount'].'|'.$post['productinfo'].'|'.$post1['firstname'].'|'.$post1['email'].'|||||||||||GQs7yium';
            //$post['hash'] = strtolower(hash('sha512', $ha));
            $postval =  $post + $post1;
            return $this->render('payu',['post'=>$postval]);
        }else{
            return $this->render('404');
        }

    }
    
    public function actionPausuccess(){
        $purchase = new Purchase();
        if(Yii::$app->request->post()){
            $response = Yii::$app->request->post();
            $purchase->user_id = Yii::$app->user->identity->id;
            $purchase->quiz_id = $response['productinfo'];
            $purchase->transaction_id = $response['mihpayid'];
            $purchase->transaction_status = $response['status'];
            $purchase->mode = $response['mode'];
            $purchase->ammount = $response['amount'];
            $purchase->created_on = new \yii\db\Expression('now()'); ;
            $purchase->json_data = json_encode($response);
            if($purchase->validate()){
                $purchase->save();
                return $this->render('pausuccess',['status'=>'Success','response'=>$response]);
            }else{
                return $this->render('pausuccess',['status'=>'failed','response'=>$response]);
            }
        }else{
            return $this->render('pausuccess',['status'=>'failed','response'=>$response]);
        }
        
       
    }
    public function actionPaufailed(){
       $purchase = new Purchase();
        if(Yii::$app->request->post()){
            $response = Yii::$app->request->post();
            $purchase->user_id = Yii::$app->user->identity->id;
            $purchase->quiz_id = $response['productinfo'];
            $purchase->transaction_id = $response['mihpayid'];
            $purchase->transaction_status = $response['status'];
            $purchase->mode = $response['mode'];
            $purchase->ammount = $response['amount'];
            $purchase->created_on = new \yii\db\Expression('now()'); ;
            $purchase->json_data = json_encode($response);
            if($purchase->validate()){
                $purchase->save();
                return $this->render('pausuccess',['status'=>'Success','response'=>$response]);
            }else{
                return $this->render('pausuccess',['status'=>'failed','response'=>$response]);
            }
        }else{
            return $this->render('pausuccess',['status'=>'failed','response'=>$response]);
        }
    }
    
}
