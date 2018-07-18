<?php

namespace backend\controllers;

use yii\rest\ActiveController;

/**
 * This is the controller class.
 *
 * @property string modelClass
 */
class UserController extends ActiveController
{
    public $modelClass = 'backend\models\Task';

    /**
     * {@inheritdoc}
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}