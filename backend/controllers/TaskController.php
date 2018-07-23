<?php

namespace backend\controllers;

use yii\rest\ActiveController;

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

    public function actionUpload()
    {
        $path = 'D:/OSPanel/domains/todo.loc/backend/web/uploads/people.txt';
        file_put_contents('./test11111111111.txt', "test");
        return "ok";
    }


}