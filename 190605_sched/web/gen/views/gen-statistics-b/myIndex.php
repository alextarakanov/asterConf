<?php

use app\models\PTotal;
use yii\helpers\Html;
use yii\grid\GridView;
use kartik\date\DatePicker;
use yii\helpers\Url;



/* @var $this yii\web\View */
/* @var $searchModel app\models\GenStatisticsBSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Statistics B tables';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gen-statistics-b-index">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>-->
<!--        --><?//= Html::a('Create Gen Statistics B', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= Html::beginForm(['gen-statistics-b/my-stat'], 'get'); ?>

    <?php

    echo '<label>Check Issue Date</label>';
    echo DatePicker::widget([
        'name' => 'dateStart',
        'value' => $dateStart,
        'pluginOptions' => [
            'format' => 'yyyy-m-d',
        ]

    ]);
    echo DatePicker::widget([
        'name' => 'dateEnd',
        'value' => $dateEnd,
        'options' => ['placeholder' => 'Select issue date ...'],
        'pluginOptions' => [
            'format' => 'yyyy-m-d',
        ]

    ]);

    ?>

    <?= Html::submitButton('submit', ['class' => 'btn btn-primary']); ?>
    <?= Html::endForm(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showFooter' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'idStatistics',
//            'projectId',
            [

                'attribute' => 'projectId',
                'format' => 'raw',
                'label' => 'id',
            ],
            [
                'attribute' => 'project_name',
                'value' => 'project.projectName',
                'label' => 'name',
//                'alte' => 'sssssdsfdfsdfs',

            ],
            [
                'attribute' => 'bNumber',
                'value' => function ($data) {
                    return Html::a(Html::encode($data->bNumber), Url::to(['stat-number', 'bNumber' => $data->bNumber]),['target'=>'_blank']);
                },
                'format' => 'raw',
            ],
            'sim_name',
//            'usedSecondPerDay',
//            'usedMinutePerDay',
//            'usedCountAnsweredCallPerDay',
            [

                'attribute' => 'usedSecondPerDay',
                'format' => 'raw',
                'label' => 'secondToMinute',
                'footer' => PTotal::pageTotal($dataProvider->models, 'usedSecondPerDay'),

            ],
            [

                'attribute' => 'usedMinutePerDay',
                'format' => 'raw',
                'label' => 'minute',
                'footer' => PTotal::pageTotal($dataProvider->models, 'usedMinutePerDay'),

            ],
            [

                'attribute' => 'usedCountAnsweredCallPerDay',
                'format' => 'raw',
                'label' => 'cnt answ',
                'footer' => PTotal::pageTotal($dataProvider->models, 'usedCountAnsweredCallPerDay'),

            ],
            [

                'attribute' => 'usedCountRepeatErrorPerDay',
                'format' => 'raw',
                'label' => 'cnt err',
                'footer' => PTotal::pageTotal($dataProvider->models, 'usedCountRepeatErrorPerDay'),

            ],
//            [
//                'attribute' => 'ACD',
////                'value' => 'GenBNumber::ACD',
//                'label' => 'ACD',
//                'footer' => PTotal::pageAverage($dataProvider->models, 'ACD'),
//
//
//            ],
//            'usedCountRepeatErrorPerDay',
//            'createDatetime',

//            ['class' => 'yii\grid\ActionColumn'],
//            [
//                'class' => 'yii\grid\ActionColumn',
//                'template' => '{view}'
//            ],
        ],

    ]); ?>


</div>
