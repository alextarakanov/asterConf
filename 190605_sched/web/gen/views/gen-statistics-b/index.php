<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\GenStatisticsBSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gen Statistics Bs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gen-statistics-b-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Gen Statistics B', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'idStatistics',
            'projectId',
            'bNumber',
            'sim_name',
//            'usedSecondPerDay',
//            'usedMinutePerDay',
//            'usedCountAnsweredCallPerDay',
            [

                'attribute' => 'usedMinutePerDay',
                'format' => 'raw',
                'label' => 'minute',
            ],
            [

                'attribute' => 'usedCountAnsweredCallPerDay',
                'format' => 'raw',
                'label' => 'cnt answ',
            ],
            [

                'attribute' => 'usedCountRepeatErrorPerDay',
                'format' => 'raw',
                'label' => 'cnt err',
            ],
            'usedCountRepeatErrorPerDay',
//            'createDatetime',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}'
            ],
        ],
    ]); ?>


</div>
