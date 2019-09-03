<?php


namespace app\controllers;

use Yii;
use app\models\GenBNumber;
use app\models\GenANumber;
use app\models\GenProject;
use yii\web\Controller;


class ExportController extends Controller
{
    public function functionExport($model,$data,$fileName) {

        foreach ($model as $array) {
            foreach ($array as $filed){
                $data .= $filed.';';
            }
            $data .= "\r\n";
        }

        header('Content-type: text/csv');
        header('Content-Disposition: attachment; filename="'.$fileName.'"');
        echo iconv('utf-8','windows-1251',$data);
        die;
    }


    public function actionIndex($export=null,$convert=null) {
        if ($export==='GenBNumber') {
            $this->actionExportBNumber();
        } elseif ( $export==='GenANumber' ){
            $this->actionExportANumber();
        } elseif ( $export==='GenProject' ){
            $this->actionExportProject();
        } else {
            echo "<pre>no action\n\r";

        }
        echo 'done';
        die;
    }
    public function actionExportBNumber() {
        $model = GenBNumber::find()->asArray()->all();
        $data = implode(';', GenBNumber::getTableSchema()->getColumnNames())."\r\n";
        $fileName='GenBNumber_' . date('Y.m.d') . '_export.csv';
        $this->functionExport($model,$data,$fileName);
    }

    public function actionExportANumber() {
        $model = GenANumber::find()->asArray()->all();
        $data = implode(';', GenANumber::getTableSchema()->getColumnNames())."\r\n";
        $fileName='GenANumber_' . date('Y.m.d') . '_export.csv';
        $this->functionExport($model,$data,$fileName);
    }
    public function actionExportProject() {
        $model = GenProject::find()->asArray()->all();
        $data = implode(';', GenProject::getTableSchema()->getColumnNames())."\r\n";
        $fileName='GenProject_' . date('Y.m.d') . '_export.csv';
        $this->functionExport($model,$data,$fileName);
    }


}