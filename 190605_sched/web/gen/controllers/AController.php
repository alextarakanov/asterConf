<?php

namespace app\controllers;

use app\models\GenANumber;
use app\models\GenANumberSearch;
use MongoDB\Driver\Query;
use Yii;
use app\models\GenProject;
use app\models\GenProjectSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GenProjectController implements the CRUD actions for GenProject model.
 */
class AController extends Controller
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
     * Lists all GenProject models.
     * @return mixed
     */
    public function actionIndex()
    {



//        $mytable = GenANumber::find()->all();
        $searchModel = new GenANumberSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

//        echo '<pre>'; var_dump($mytable->sim);die;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
//        $update=Yii::$app->db->createCommand('UPDATE gen_project SET setMinimumMinutePerDay=727 WHERE projectId=2')->execute();
//        $insert=Yii::$app->db->createCommand()->insert('gen_project',[
//                'projectName' => 'AAAAAAAA',
//                'projectNameDescribe' => 'bbbbbbb',
//            ])->execute();
//        $posts1 = Yii::$app->db->createCommand('SELECT * FROM gen_project where projectId=:projectId')->bindParam(':projectId', $id);
//        $id=3;
//        $post = $posts1->queryOne();
//        $posts1 = Yii::$app->db->getTableSchema('gen_project');
//        var_dump(GenProject::className());die;
//        $aa = 1;
//        $b = 400;
//        $post1 = (new \yii\db\Query())->select(['projectName', 'enableProject'])->from('gen_project')
//            ->where([
//                'and', 'enableProject <= :aa', 'setMinimumConnectSecond >= :b'
//            ])
//            ->addParams([':aa' => $aa])
//            ->addParams([':b' => $b])
//            ->all();;
//        echo "<pre>";
//        var_dump($post1);
//        var_dump($post);
//        var_dumpYii::getAlias('@bar');
        exit;
    }

    /**
     * Displays a single GenProject model.
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
     * Creates a new GenProject model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GenProject();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->projectId]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing GenProject model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->projectId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing GenProject model.
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
     * Finds the GenProject model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GenProject the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GenProject::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
