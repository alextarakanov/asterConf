<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\GenStatisticsASearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gen Statistics As';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gen-statistics-a-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Gen Statistics A', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idStatistics',
            'projectId',
            'aNumber',
            'sim_name',
            'usedSecondPerDay',
            //'usedMinutePerDay',
            //'usedCountAnsweredCallPerDay',
            //'usedCountRepeatErrorPerDay',
            //'createDatetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
