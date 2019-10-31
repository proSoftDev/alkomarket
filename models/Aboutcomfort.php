<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aboutcomfort".
 *
 * @property int $id
 * @property string $image
 * @property string $content
 */
class Aboutcomfort extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aboutcomfort';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'content'], 'required'],
            [['content'], 'string'],
            [['image'], 'file', 'extensions' => 'png,jpg,jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Картинка',
            'content' => 'Содержание',
        ];
    }

    public function saveImage($filename)
    {
        $this->image = $filename;
        return $this->save(false);
    }

    public function getImage()
    {
        return ($this->image) ? '/uploads/' . $this->image : '/no-image.png';
    }

    public function deleteImage()
    {
        $imageUploadModel = new ImageUpload();
        $imageUploadModel->deleteCurrentImage($this->image);
    }

    public function beforeDelete()
    {
        $this->deleteImage();
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }
}
