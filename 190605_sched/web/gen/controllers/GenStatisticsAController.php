<?php

namespace app\controllers;

use app\models\GenProject;
use app\models\GenStatisticsBSearch;
use Yii;
use app\models\GenStatisticsA;
use app\models\GenStatisticsASearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GenStatisticsAController implements the CRUD actions for GenStatisticsA model.
 */
class GenStatisticsAController extends Controller
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


        $searchModel = new GenStatisticsASearch();

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



    public function actionStatNumber($aNumber)
    {

        $searchModel = new GenStatisticsASearch();

        $searchModel->aNumberCheck=$aNumber;

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
            'aNumberCheck'=> $aNumber,

        ]);


    }
    public function actionStatNumbers()
    {
//        $projectModel = new GenProject();
        $modelProjectId = GenProject::find()
            ->all();
//        echo '<pre>'; var_dump($projectId);die;

        $searchModel = new GenStatisticsASearch();


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
     * Lists all GenStatisticsA models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GenStatisticsASearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GenStatisticsA model.
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
     * Creates a new GenStatisticsA model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GenStatisticsA();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idStatistics]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing GenStatisticsA model.
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
     * Deletes an existing GenStatisticsA model.
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
     * Finds the GenStatisticsA model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GenStatisticsA the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GenStatisticsA::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
