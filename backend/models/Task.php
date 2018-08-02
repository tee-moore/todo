<?php

namespace backend\models;

use \yii\db\ActiveRecord;
use \yii\web\UploadedFile;

/**
 * This is the model class for table "Task".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $created_at
 * @property int $started_at
 * @property string $status
 * @property string $imagefile
 * @property string $imagefilepath
 */
class Task extends ActiveRecord
{

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
            [['imagefile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif', 'checkExtensionByMimeType' => false],
	        [['imagefilepath'], 'string'],
        ];
    }

    public function upload()
    {
        if ($this->validate()){
            if($this->imagefile){
                $date = date('Y-m-d H-i-s');
                $path = "uploads/". $this->imagefile->baseName .' - '. $date .'.'. $this->imagefile->extension;
                $this->imagefile->saveAs($path);
                $this->imagefilepath = $path;
                return true;
            } else {
                $this->imagefile = null;
                $this->imagefilepath = null;
                return false;
            }
        }
    }
}