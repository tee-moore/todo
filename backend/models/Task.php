<?php

namespace backend\models;

use \yii\db\ActiveRecord;

/**
 * This is the model class for table "Task".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $created_at
 * @property int $started_at
 * @property string $status
 * @property string imagefilepath
 */
class Task extends ActiveRecord
{

	public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
	        [['title', 'status'], 'string', 'max' => 255],
	        [['description', 'created_at'], 'string'],
            [['started_at'], 'integer'],
	        [['imagefile'], 'file'],
	        [['imagefilepath'], 'safe'],
        ];
    }
}
