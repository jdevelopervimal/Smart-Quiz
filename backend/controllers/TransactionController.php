<?php
/**
 * Description of TransactionController
 *
 * @author Vimal
 */

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Purchase;
class TransactionController extends Controller{
   public $enableCsrfValidation = false;
   
   public function actionIndex(){
    $transaction = Purchase::getDetailedTransaction();
    return $this->render('index',['transactions'=>$transaction]);
   }
}
