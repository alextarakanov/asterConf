<?php

use app\models\PTotal;
use yii\helpers\Html;
use yii\grid\GridView;
use kartik\date\DatePicker;



/* @var $this yii\web\View */
/* @var $searchModel app\models\GenStatisticsBSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Statistics B tables'.$searchModel->aNumber;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gen-statistics-a-index">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>-->
<!--        --><?//= Html::a('Create Gen Statistics B', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= Html::beginForm(['gen-statistics-a/stat-number'], 'get'); ?>

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
    <input type="hidden" name="aNumber" value="<?=$aNumberCheck ?>" />

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
            'aNumber',
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
//            'usedCountRepeatErrorPerDay',
//            'createDatetime',

            [
                'headerOptions' => ['title' => 'дата создания cdr [createDatetime]'],
                'format' => ['date', 'dd.MM.Y'],
                'attribute' => 'createDatetime',
                'label' => 'date',
            ],
//            ['class' => 'yii\grid\ActionColumn'],
//            [
//                'class' => 'yii\grid\ActionColumn',
//                'template' => '{view}'
//            ],
        ],

    ]); ?>


</div>
