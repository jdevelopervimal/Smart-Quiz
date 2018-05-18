<?php

namespace backend\controllers;
use common\models\Role;
use yii;
class RoleController extends \yii\web\Controller
{
    public function actionIndex()
    {
						$roles = Role::find()->all();
        return $this->render('index',['roles'=>$roles]);
    }
				public function actionCreate()
    {
							$model = new Role(); 
        return $this->render('create',['model'=>$model]);
    }
				public function actionView()
		  {
								
								$model = new Role(); 
								
        return $this->render('view',['model'=>$model]);
    }

}
