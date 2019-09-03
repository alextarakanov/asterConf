<?php


namespace app\controllers;

use app\models\GenProject;
//use arogachev\excel\import\basic\Importer;
use ruskid\csvimporter\CSVImporter;
use app\models\GenANumber;
use Yii;
use yii\helpers\Html;


use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\UploadTable;


class ImportController extends Controller

{
    public function actionUpload($table,$side)
    {
        $model = new UploadTable();

        if (Yii::$app->request->isPost) {
            $model->uploadTableFile = UploadedFile::getInstance($model, 'uploadTableFile');
            if ($model->upload()) {
                // file is uploaded successfully
//                return;
                return Yii::$app->response->redirect(['import/indexs', 'uploadTableFile' => $model->uploadTableFile->name, 'side'=>$side])->send();

            }
        }

        return $this->render('index', [
            'model' => $model,
            'table' => $table,
            'side' => $side,
        ]);
    }


    public function actionIndexs($uploadTableFile, $side)
    {


        Yii::$app->db->createCommand("
            LOAD DATA LOCAL
             INFILE 'uploads/" . $uploadTableFile . "' IGNORE
             INTO TABLE gen_".$side."Number
             FIELDS TERMINATED BY ';'
             LINES TERMINATED BY '\n'
             IGNORE 1 LINES
                (
                 `".$side."Number`,
                 @projectId,
                 @sim_name,
                 @".$side."NumberEnable,
                 @setMinutePerDay,
                 `describe`,
                 @createDatetime
                )
             SET
              `sim_name`= if(@sim_name='',NULL,@sim_name),
              `".$side."NumberEnable`= if(@".$side."NumberEnable='','1',@".$side."NumberEnable),
              `projectId`= if(@projectId='','1',@projectId),
              `setMinutePerDay`= if(@setMinutePerDay='','555',@setMinutePerDay),
              `createDatetime`=now()
        
  ")->execute();
        unlink('uploads/'.$uploadTableFile);
        return $this->redirect(['gen-'.$side.'-number/index']);

    }


}
