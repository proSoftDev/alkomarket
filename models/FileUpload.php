<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class FileUpload extends Model{

    public $file;




    public function uploadFile(UploadedFile $file, $currentImage)
    {
        $this->file = $file;

        if($this->validate())
        {
            $this->deleteCurrentFile($currentImage);
            return $this->saveFile();
        }

    }

    public function getFolder()
    {
        return Yii::getAlias('@web') . 'uploads/pdf/';
    }

    private function generateFilename()
    {
        return strtolower(md5(uniqid($this->file->baseName)) . '.' . $this->file->extension);
    }

    public function deleteCurrentFile($currentImage)
    {
        if($this->fileExists($currentImage))
        {
            unlink($this->getFolder() . $currentImage);
        }
    }

    public function fileExists($currentImage)
    {
        if(!empty($currentImage) && $currentImage != null)
        {
            return file_exists($this->getFolder() . $currentImage);
        }
    }

    public function saveFile()
    {
        $filename = $this->generateFilename();

        $this->file->saveAs($this->getFolder() . $filename);

        return $filename;
    }
}