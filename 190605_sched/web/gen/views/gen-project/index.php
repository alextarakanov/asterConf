<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GenProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gen Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gen-project-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Gen Project', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Export', ['export/export-project'], ['class' => 'btn btn-info']) ?>

    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
//        'currentTable' => $currentTable,
        'rowOptions'=> function ($model, $key, $index, $column) use ($currentTable)
        {
//            echo '<pre>';var_dump($model->genSched);die;
            if( $model->usedCallLimitNow >=  $model->genSched->$currentTable   ){ return ['class' => 'danger'] ; }
            if( $model->enableProject ===  0   ){ return ['class' => 'warning'] ; }


        },
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}'
            ],

            'projectId',
            'projectName',
            'projectNameDescribe',
            [


                'attribute' => 'enableProject',
                'format' => 'raw',
                'filter' => [
                    0 => 'No',
                    1 => 'Yes',
                ],
                'value' => function ($model, $key, $index, $column) {
                    $active = $model->{$column->attribute} === 1;
                    return \yii\helpers\Html::tag(
                        'span',
                        $active ? 'Yes' : 'No',
                        [
                            'class' => 'label label-' . ($active ? 'success' : 'danger'),
                        ]
                    );
                },
            ],

            "genSched.$currentTable",
            'usedCallLimitNow',
            'setMinimumConnectSecond',
            'setMaximumConnectSecond',
            'setMinimumMinutePerDay',
            'setMaximumMinutePerDay',
            'setMinutePerMonth',
            'setCountRepeatErrorPerDay',
            'setCountAnsweredCallPerDay',
            'setCountAnsweredCallPerMonth',
//            'setTimeSuccessCallSeconds',
            'setSoundDir',
//            'restMinuteEveryDay',
            [
                'attribute' => 'restMinuteEveryDay',
                'format' => 'raw',
                'filter' => [
                    0 => 'No',
                    1 => 'Yes',
                ],
                'value' => function ($model, $key, $index, $column) {
                    $active = $model->{$column->attribute} === 1;
                    return \yii\helpers\Html::tag(
                        'span',
                        $active ? 'Yes' : 'No',
                        [
                            'class' => 'label label-' . ($active ? 'success' : 'danger'),
                        ]
                    );
                },
            ],
//            'restMinuteEveryMonth',
            [
                'attribute' => 'restMinuteEveryMonth',
                'format' => 'raw',
                'filter' => [
                    0 => 'No',
                    1 => 'Yes',
                ],
                'value' => function ($model, $key, $index, $column) {
                    $active = $model->{$column->attribute} === 1;
                    return \yii\helpers\Html::tag(
                        'span',
                        $active ? 'Yes' : 'No',
                        [
                            'class' => 'label label-' . ($active ? 'success' : 'danger'),
                        ]
                    );
                },
            ],
//            'setOutgoingSchedulerTrunk',
            [
                'attribute' => 'setOutgoingSchedulerTrunk',
                'format' => 'raw',
                'filter' => [
                    0 => 'No',
                    1 => 'Yes',
                ],
                'value' => function ($model, $key, $index, $column) {
                    $active = $model->{$column->attribute} === 1;
                    return \yii\helpers\Html::tag(
                        'span',
                        $active ? 'Yes' : 'No',
                        [
                            'class' => 'label label-' . ($active ? 'success' : 'danger'),
                        ]
                    );
                },
            ],
            'createDatetime',

        ],
    ]); ?>
    <br>
    <div>описание цветов:</div>
        <div class="bg-danger">привышено количество одновременных звонков на проекте</div>
        <div class="bg-warning">проект отключен</div>

    <div class="center-block">
        <img src="/files/porevo.png" alt="жарим">
    </div>


</div>
