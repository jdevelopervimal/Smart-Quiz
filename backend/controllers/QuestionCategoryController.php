<?php

namespace backend\controllers;

use Yii;
use common\models\QuestionCategory;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * QuestionCategoryController implements the CRUD actions for QuestionCategory model.
 */
class QuestionCategoryController extends Controller
{
			public	$enableCsrfValidation	=	false;
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all QuestionCategory models.
     * @return mixed
     */
    public function actionIndex($msg = '')
    {
        $dataProvider = new ActiveDataProvider([
            'query' => QuestionCategory::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
												'msg'=>$msg,
        ]);
    }

    /**
     * Displays a single QuestionCategory model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new QuestionCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $Qcategory = new QuestionCategory();

        if (Yii::$app->request->post()) {
												$post = Yii::$app->request->post();
												if(isset($post['cid'])){
														$Qcategory = QuestionCategory::find()->where(['cid'=>$post['cid']])->one();
												}
												$Qcategory->category_name = $post['category_name'];
												$Qcategory->	cat_duration = $post['cat_duration'];
													if($Qcategory->validate()){
															$Qcategory->save();
														$msg = 'Successfully saved';
																$this->redirect(['index','msg'=>$msg]);
													}
        } else {
            return $this->render('create', [
                'model' => $Qcategory,
            ]);
        }
    }

    /**
     * Updates an existing QuestionCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing QuestionCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the QuestionCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return QuestionCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = QuestionCategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
