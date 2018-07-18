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
 * @property string $img
 */
class Task extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'created_at', 'status', 'img'], 'safe'],
            [['created_at', 'started_at'], 'integer'],
            [['title', 'description', 'status', 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'created_at' => 'Created At',
            'started_at' => 'Started At',
            'status' => 'Status',
            'img' => 'Image',
        ];
    }
}
