<?php

namespace backend\controllers;

use yii\rest\ActiveController;
use yii\web\UploadedFile;
use backend\models\Task;

/**
 * This is the controller class.
 *
 * @property string modelClass
 */
class TaskController extends ActiveController
{
    public $modelClass = 'backend\models\task';

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return array_merge(parent::behaviors(), [

            // For cross-domain AJAX request
            'corsFilter'  => [
                'class' => \yii\filters\Cors::className(),
                'cors' => [
                    // restrict access to
                    'Origin' => ['*'],
                    'Access-Control-Request-Method'    => ['GET', 'POST', 'PUT', 'DELETE'],
                    'Access-Control-Request-Headers'   => ['*'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age'           => 3600,
                    'Access-Control-Expose-Headers'    => ['X-Pagination-Current-Page'],
                ],
            ],

        ]);
    }

	public function actions()
	{
		$actions = parent::actions();

		// disable the "delete" and "create" actions
		unset($actions['create']);

		return $actions;
	}

	public function actionCreate()
	{

		$model = new Task();
		$date = date('Y-m-d H-i-s');

		$file = UploadedFile::getInstancesByName("imagefile");
		$model->load(\Yii::$app->request->post(),'');

		if($file){
			$file = $file[0];
			$path = "./uploads/".$file->baseName .' - '. $date .'.'. $file->extension;
			$file->saveAs($path, true);
			$model->imagefile = $path;
		}

		$model->save();
		return $model;
	}
}