<?php

namespace app\controllers;

use app\models\GenProject;
use Yii;
use app\models\GenANumber;
use app\models\GenANumberSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * GenANumberController implements the CRUD actions for GenANumber model.
 */
class GenANumberController extends Controller
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
     * Lists all GenANumber models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GenANumberSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GenANumber model.
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
     * Creates a new GenANumber model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GenANumber();
        $model->loadDefaultValues();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->aNumber]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing GenANumber model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->aNumber]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing GenANumber model.
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

            Yii::$app->db->createCommand("truncate table " . GenANumber::tableName())->execute();
        }

        return $this->redirect(['index']);
    }

    public function actionGroup()
    {


        $model = new GenANumber();


        if (!($model->numberFromViewToController = Yii::$app->request->post('numberFromViewToController')) && Yii::$app->request->post('GenANumber')['restUsedCountRepeatErrorPerDay'] === null) {
            $model->numberFromViewToController = array();
        }


        $projectIDtoName = ArrayHelper::map(GenProject::find()->all(), 'projectId', 'projectName');

        if ( Yii::$app->request->post('numberFromViewToController') ) {

            $aNumber=Yii::$app->request->post('numberFromViewToController');

        }
        if (Yii::$app->request->post('GenANumber')['aNumberEnable'] == 1) {
            GenANumber::updateAll(['aNumberEnable' => 1], ['aNumber' => $aNumber]);

        } elseif (Yii::$app->request->post('GenANumber')['aNumberEnable'] == 0 && Yii::$app->request->post('GenANumber')['aNumberEnable'] != null) {
            GenANumber::updateAll(['aNumberEnable' => 0], ['aNumber' => $aNumber]);

        }

        if (Yii::$app->request->post('GenANumber')['restUsedCountRepeatErrorPerDay'] == 1) {
            GenANumber::updateAll(['usedCountRepeatErrorPerDay' => 0], ['aNumber' => $aNumber]);

        }

        if (Yii::$app->request->post('GenANumber')['restUsedCountRepeatErrorTotal'] == 1) {
            GenANumber::updateAll(['usedCountRepeatErrorTotal' => 0], ['aNumber' => $aNumber]);

        }
        if (Yii::$app->request->post('GenANumber')['restUsedCountAnsweredCallPerDay'] == 1) {
            GenANumber::updateAll(['usedCountAnsweredCallPerDay' => 0], ['aNumber' => $aNumber]);

        }
        if (Yii::$app->request->post('GenANumber')['restUsedCountAnsweredCallPerMonth'] == 1) {
            GenANumber::updateAll(['usedCountAnsweredCallPerMonth' => 0], ['aNumber' => $aNumber]);

        }
        if (Yii::$app->request->post('GenANumber')['restUsedCountAnsweredCallTotal'] == 1) {
            GenANumber::updateAll(['usedCountAnsweredCallTotal' => 0], ['aNumber' => $aNumber ]);

        }

        if (Yii::$app->request->post('GenANumber')['restUsedMinutePerDay'] == 1) {
            GenANumber::updateAll(['usedSecondPerDay' => 0, 'usedMinutePerDay' => 0], ['aNumber' => $aNumber]);

        }


        if (Yii::$app->request->post('GenANumber')['restUsedMinutePerMonth'] == 1) {
            GenANumber::updateAll(['usedSecondPerMonth' => 0, 'usedMinutePerMonth' => 0], ['aNumber' => $aNumber ]);

        }

        if (Yii::$app->request->post('GenANumber')['restUsedTotalMinute'] == 1) {
            GenANumber::updateAll(['usedTotalSecond' => 0, 'usedTotalMinute' => 0], ['aNumber' => $aNumber]);

        }

        if (Yii::$app->request->post('GenANumber')['stateALeg'] == 1) {
//            var_dump($aNumber);die;
            GenANumber::updateAll(['stateALeg' => 'IDLE'], ['aNumber' => $aNumber ]);
        }
        if (Yii::$app->request->post('GenANumber')['stateBLeg'] == 1) {
            GenANumber::updateAll(['stateBLeg' => 'IDLE'], ['aNumber' => $aNumber ]);
        }


        if (Yii::$app->request->post('GenANumber')['restSetMinutePerDay'] == 1) {
//                    echo '<pre>';
//        var_dump( Yii::$app->request->post('GenANumber')['restSetMinutePerDay']);
//        die;
//            $min= rand( Yii::$app->request->post('GenANumber')['setMinutePerDayStart'] , Yii::$app->request->post('GenANumber')['setMinutePerDayStop'] );
//
//            GenANumber::updateAll(['setMinutePerDay' => $min], ['aNumber' => Yii::$app->request->post('numberFromViewToController')]);


            if (Yii::$app->request->post('GenANumber')['restSetMinutePerDay'] == 1) {
                foreach ($aNumber as $itemANumber) {
                    $minute = rand(Yii::$app->request->post('GenANumber')['setMinutePerDayStart'], Yii::$app->request->post('GenANumber')['setMinutePerDayStop']);
                    Yii::$app->db->createCommand()
                        ->update('gen_aNumber', ['setMinutePerDay' => $minute], 'aNumber = '.$itemANumber.'')
                        ->execute();
                }

            }

        }
        if (Yii::$app->request->post('GenANumber')['restProjectId'] == 1) {
//            echo Yii::$app->request->post('GenANumber')['projectId'];die;
            GenANumber::updateAll(['projectId' => Yii::$app->request->post('GenANumber')['projectId']], ['aNumber' => $aNumber]);

        }
        if (Yii::$app->request->post('GenANumber')['delete'] == 1) {
            GenANumber::deleteAll(['aNumber' => $aNumber]);
        }


        if (isset(Yii::$app->request->post('GenANumber')['projectId'])) {
            return $this->redirect(['index']);
        }


        return $this->render('group',
            [
                'model' => $model,
                'projectIDtoName' => $projectIDtoName,

            ]);

    }


    /**
     * Finds the GenANumber model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GenANumber the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GenANumber::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
