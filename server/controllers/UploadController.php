<?php

namespace app\controllers;

use Yii;
use yii\rest\Controller;
use yii\filters\ContentNegotiator;
use yii\web\Response;
use yii\web\UploadedFile;

Class UploadController extends Controller
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
		return [
			'get'=>Yii::$app->request->get(), 
			'post'=>Yii::$app->request->post(),
			'files'=>$_FILES
		];
	}
}