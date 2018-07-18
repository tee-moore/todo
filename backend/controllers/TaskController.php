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
}