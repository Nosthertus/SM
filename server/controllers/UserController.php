<?php
namespace app\controllers;

use Yii;
use yii\rest\Controller;
use yii\filters\ContentNegotiator;
use yii\web\Response;

use app\models\User;
use app\models\LoginForm;
use app\models\SignupForm;

class UserController extends Controller
{
	public function behaviors()
	{
		return [
			[
				'class'=>ContentNegotiator::className(),
				'formats'=>[
					'application/json'=>Response::FORMAT_JSON
				]
			]
		];
	}

	public function actionIndex()
	{
		return User::find()->all();
	}

	public function actionView($id)
	{
		return User::findOne($id);
	}

	public function actionAccess()
	{
		$response = [
			'success'=>false,
			'errors'=>[],
			'data'=>[]
		];

		$model = new LoginForm();

		$post = ['LoginForm'=>Yii::$app->request->post()];

		$model->load($post);

		if($model->validate())
		{
			$response['data'] = User::find(['username'=>$post['LoginForm']['username']])->select(['id', 'username', 'email', 'auth_key'])->one();

			$response['success'] = true;
		}

		else
			$response['errors'] = $model->getErrors();

		return $response;
	}

	public function actionCreate()
	{
		$response = [
			'success'=>false,
			'errors'=>[],
			'data'=>[]
		];

		$model = new SignupForm();

		$post = $model->load(['SignupForm'=>Yii::$app->request->post()]);

		if($user = $model->signup())
		{
			$response['data'] = $user;

			$response['success'] = true;
		}

		else
			$response['errors'] = $model->getErrors();

		return $response;
	}
}