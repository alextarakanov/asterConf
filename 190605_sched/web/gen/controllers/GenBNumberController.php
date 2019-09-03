<?php

namespace app\controllers;

use app\models\GenProject;
use app\models\scheduler\ClassScheduler;
//use app\models\scheduler\ClassPack;

use app\models\Sim;
use Yii;
use app\models\GenBNumber;
use app\models\GenANumber;
use app\models\GenBNumberSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\ArrayHelper;

/**
 * GenBNumberController implements the CRUD actions for GenBNumber model.
 */
class GenBNumberController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all GenBNumber models.
     * @return mixed
     */
    public function actionIndex()
    {


        $searchModel = new GenBNumberSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//        $objACD = new GenBNumber;
//        $acd = $objACD->getACD();

//var_dump($acd);die;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
//            'acd' => $acd,

        ]);
    }

    /**
     * Displays a single GenBNumber model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new GenBNumber model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GenBNumber();
        $model->loadDefaultValues();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->bNumber]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing GenBNumber model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


//        var_dump($projectName);die;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->bNumber]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing GenBNumber model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionAllDelete($side)
    {
        if ($side === 'a') {
            Yii::$app->db->createCommand("truncate table " . GenANumber::tableName())->execute();

        } elseif ($side === 'b') {

            Yii::$app->db->createCommand("truncate table " . GenBNumber::tableName())->execute();
        }

        return $this->redirect(['index']);
    }

    public function actionGroup()
    {


        $model = new GenBNumber();
        $objScheduler = new classScheduler();


        if (!($model->numberFromViewToController = Yii::$app->request->post('numberFromViewToController')) && Yii::$app->request->post('GenBNumber')['restUsedCountRepeatErrorPerDay'] === null) {
            $model->numberFromViewToController = array();
        }


        $projectIDtoName = ArrayHelper::map(GenProject::find()->all(), 'projectId', 'projectName');

        if (Yii::$app->request->post('numberFromViewToController')) {
            $bNumber = Yii::$app->request->post('numberFromViewToController');

        }

        if (Yii::$app->request->post('GenBNumber')['restUsedCountRepeatErrorPerDay'] == 1) {
            GenBNumber::updateAll(['usedCountRepeatErrorPerDay' => 0], ['bNumber' => $bNumber]);

        }
        if (Yii::$app->request->post('GenBNumber')['bNumberEnable'] == 1) {
            GenBNumber::updateAll(['bNumberEnable' => 1], ['bNumber' => $bNumber]);

        } elseif (Yii::$app->request->post('GenBNumber')['bNumberEnable'] == 0 && Yii::$app->request->post('GenBNumber')['bNumberEnable'] != null) {
            GenBNumber::updateAll(['bNumberEnable' => 0], ['bNumber' => $bNumber]);

        }

        if (Yii::$app->request->post('GenBNumber')['restUsedCountRepeatErrorTotal'] == 1) {
            GenBNumber::updateAll(['usedCountRepeatErrorTotal' => 0], ['bNumber' => $bNumber]);

        }
        if (Yii::$app->request->post('GenBNumber')['restUsedCountAnsweredCallPerDay'] == 1) {
            GenBNumber::updateAll(['usedCountAnsweredCallPerDay' => 0], ['bNumber' => $bNumber]);

        }
        if (Yii::$app->request->post('GenBNumber')['restUsedCountAnsweredCallPerMonth'] == 1) {
            GenBNumber::updateAll(['usedCountAnsweredCallPerMonth' => 0], ['bNumber' => $bNumber]);

        }
        if (Yii::$app->request->post('GenBNumber')['restUsedCountAnsweredCallTotal'] == 1) {
            GenBNumber::updateAll(['usedCountAnsweredCallTotal' => 0], ['bNumber' => $bNumber]);

        }

        if (Yii::$app->request->post('GenBNumber')['restUsedMinutePerDay'] == 1) {
            GenBNumber::updateAll(['usedSecondPerDay' => 0, 'usedMinutePerDay' => 0], ['bNumber' => $bNumber]);

        }

        if (Yii::$app->request->post('GenBNumber')['restUsedMinutePerMonth'] == 1) {
            GenBNumber::updateAll(['usedSecondPerMonth' => 0, 'usedMinutePerMonth' => 0], ['bNumber' => $bNumber]);

        }

        if (Yii::$app->request->post('GenBNumber')['restUsedTotalMinute'] == 1) {
            GenBNumber::updateAll(['usedTotalSecond' => 0, 'usedTotalMinute' => 0], ['bNumber' => $bNumber]);

        }

        if (Yii::$app->request->post('GenBNumber')['stateALeg'] == 1) {
            GenBNumber::updateAll(['stateALeg' => 'IDLE'], ['bNumber' => $bNumber]);
        }
        if (Yii::$app->request->post('GenBNumber')['stateBLeg'] == 1) {
            GenBNumber::updateAll(['stateBLeg' => 'IDLE'], ['bNumber' => $bNumber]);
        }


        if (Yii::$app->request->post('GenBNumber')['restSetMinutePerDay'] == 1) {
            foreach ($bNumber as $itemBNumber) {
                $minute = rand(Yii::$app->request->post('GenBNumber')['setMinutePerDayStart'], Yii::$app->request->post('GenBNumber')['setMinutePerDayStop']);
                Yii::$app->db->createCommand()
                    ->update('gen_bNumber', ['setMinutePerDay' => $minute], 'bNumber = ' . $itemBNumber . '')
                    ->execute();
            }

        }
        if (Yii::$app->request->post('GenBNumber')['restProjectId'] == 1) {
            GenBNumber::updateAll(['projectId' => Yii::$app->request->post('GenBNumber')['projectId']], ['bNumber' => $bNumber]);

        }
        if (Yii::$app->request->post('GenBNumber')['smb_dev_disable'] == 'disable') {
            $arraySimName = GenBNumber::find()->select('sim_name')->where(['bNumber' => $bNumber])->asArray()->all();

            foreach ($arraySimName as $key => $value) {
                Sim::updateAll(['dev_disable' => '1'], ['sim_name' => $value['sim_name']]);
                $objScheduler->disableSim($value['sim_name']);
            }

            unset($arraySimName);
        } elseif (Yii::$app->request->post('GenBNumber')['smb_dev_disable'] == 'enable') {
            $arraySimName = GenBNumber::find()->select('sim_name')->where(['bNumber' => $bNumber])->asArray()->all();

            foreach ($arraySimName as $key => $value) {
                Sim::updateAll(['dev_disable' => '0'], ['sim_name' => $value['sim_name']]);
                $objScheduler->enableSim($value['sim_name']);

            }
            unset($arraySimName);
        }
        if (Yii::$app->request->post('GenBNumber')['delete'] == 1) {
            GenBNumber::deleteAll(['bNumber' => $bNumber]);
        }


        if (isset(Yii::$app->request->post('GenBNumber')['projectId'])) {
            return $this->redirect(['index']);
        }


        return $this->render('group',
            [
                'model' => $model,
                'projectIDtoName' => $projectIDtoName,

            ]);

    }


    /**
     * Finds the GenBNumber model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GenBNumber the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GenBNumber::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
