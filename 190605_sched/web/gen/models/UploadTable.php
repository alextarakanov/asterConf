<?php


namespace app\models;
use yii\web\UploadedFile;
use yii\base\Model;

class UploadTable extends Model
{
    public $uploadTableFile;

    public function rules()
    {
        return [
            [['uploadTableFile'], 'required'],
            [['uploadTableFile'], 'file', 'checkExtensionByMimeType' => false, 'extensions' => ['csv', 'xls', 'xlsx'],'skipOnEmpty' => FALSE],

        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->uploadTableFile->saveAs('uploads/' . $this->uploadTableFile->baseName . '.' . $this->uploadTableFile->extension);
            return true;
        } else {
            return false;
        }
    }
}