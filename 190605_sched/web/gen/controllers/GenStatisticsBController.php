<?php

namespace app\controllers;

use app\models\GenProject;
use Yii;
use app\models\GenStatisticsB;
use app\models\GenStatisticsBSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GenStatisticsBController implements the CRUD actions for GenStatisticsB model.
 */
class GenStatisticsBController extends Controller
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

    public function actionMyStat()
    {


        $searchModel = new GenStatisticsBSearch();

        if (!empty($dateStart = Yii::$app->request->get('dateStart')) && !empty($dateEnd = Yii::$app->request->get('dateEnd'))) {
            $searchModel->yearStart = date('Y', strtotime($dateStart));
            $searchModel->monthStart = date("m", strtotime($dateStart));
            $searchModel->dayStart = date("d", strtotime($dateStart));
            $searchModel->yearEnd = date('Y', strtotime($dateEnd));
            $searchModel->monthEnd = date('m', strtotime($dateEnd));
            $searchModel->dayEnd = date('d', strtotime($dateEnd));
//            $dateStart = Yii::$app->request->get('dateStart');
//            $dateEnd = Yii::$app->request->get('dateEnd');

        } else {
            $dateStart = $searchModel->yearStart . '-' . $searchModel->monthStart . '-' . $searchModel->dayStart;
            $dateEnd = $searchModel->yearEnd . '-' . $searchModel->monthEnd . '-' . $searchModel->dayEnd;
        }
//        var_dump(Yii::$app->request->queryParams);die;
        $dataProvider = $searchModel->mySearch(Yii::$app->request->queryParams);


        return $this->render('myIndex', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dateStart' => $dateStart,
            'dateEnd' => $dateEnd,

        ]);

    }



    public function actionStatNumber($bNumber)
    {

        $searchModel = new GenStatisticsBSearch();

        $searchModel->bNumberCheck=$bNumber;

        if (!empty($dateStart = Yii::$app->request->get('dateStart')) && !empty( $dateEnd = Yii::$app->request->get('dateEnd'))) {
            $searchModel->yearStart = date('Y', strtotime($dateStart));
            $searchModel->monthStart = date("m", strtotime($dateStart));
            $searchModel->dayStart = date("d", strtotime($dateStart));
            $searchModel->yearEnd = date('Y', strtotime($dateEnd));
            $searchModel->monthEnd = date('m', strtotime($dateEnd));
            $searchModel->dayEnd = date('d', strtotime($dateEnd));
//                var_dump($searchModel->dayStart);die;
        } else {
            $dateStart = $searchModel->yearStart . '-' . $searchModel->monthStart . '-' . $searchModel->dayStart;
            $dateEnd = $searchModel->yearEnd . '-' . $searchModel->monthEnd . '-' . $searchModel->dayEnd;
        }

        $dataProvider = $searchModel->mySearchNumber(Yii::$app->request->queryParams);

        return $this->render('myIndexNumber', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dateStart' => $dateStart,
            'dateEnd' => $dateEnd,
            'bNumberCheck'=> $bNumber,

        ]);


    }
    public function actionStatNumbers()
    {
//        $projectModel = new GenProject();
        $modelProjectId = GenProject::find()
            ->all();
//        echo '<pre>'; var_dump($projectId);die;

        $searchModel = new GenStatisticsBSearch();

//        $searchModel->bNumberCheck=$bNumber;

        if (!empty($projectId = Yii::$app->request->get('projectId'))) {
            $searchModel->projectId=$projectId;
        }


        if (!empty($dateStart = Yii::$app->request->get('dateStart')) && !empty( $dateEnd = Yii::$app->request->get('dateEnd'))) {
            $searchModel->yearStart = date('Y', strtotime($dateStart));
            $searchModel->monthStart = date("m", strtotime($dateStart));
            $searchModel->dayStart = date("d", strtotime($dateStart));
            $searchModel->yearEnd = date('Y', strtotime($dateEnd));
            $searchModel->monthEnd = date('m', strtotime($dateEnd));
            $searchModel->dayEnd = date('d', strtotime($dateEnd));
//                var_dump($searchModel->dayStart);die;
        } else {
            $dateStart = $searchModel->yearStart . '-' . $searchModel->monthStart . '-' . $searchModel->dayStart;
            $dateEnd = $searchModel->yearEnd . '-' . $searchModel->monthEnd . '-' . $searchModel->dayEnd;
        }

        $dataProvider = $searchModel->mySearchNumbers(Yii::$app->request->queryParams);

        return $this->render('myIndexNumbers', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dateStart' => $dateStart,
            'dateEnd' => $dateEnd,
            'projectId' => $projectId,
            'modelProjectId' => $modelProjectId,

        ]);


    }

    /**
     * Lists all GenStatisticsB models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GenStatisticsBSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GenStatisticsB model.
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
     * Creates a new GenStatisticsB model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GenStatisticsB();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idStatistics]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing GenStatisticsB model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idStatistics]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing GenStatisticsB model.
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

    /**
     * Finds the GenStatisticsB model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GenStatisticsB the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GenStatisticsB::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
