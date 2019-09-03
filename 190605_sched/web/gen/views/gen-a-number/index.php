<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\PTotal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GenANumberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gen A Numbers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gen-anumber-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Gen A Number', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Export', ['export/export-a-number'], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Import', ['import/upload', 'table' => 'genANumber', 'side' => 'a'], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Delete ALL', ['all-delete', 'side' => 'a'], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete all data from tables?',
                'method' => 'post',
            ],
        ]) ?>

    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= Html::beginForm(['gen-a-number/group'], 'post'); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showFooter' => true,
        'rowOptions' => function ($model, $key, $index, $column) {
            if ($model->project->enableProject === 0) {
                return ['class' => 'danger'];
            }
            if ($model->aNumberEnable === 0) {
                return ['class' => 'danger'];
            }
            if ($model->usedMinutePerDay >= $model->setMinutePerDay) {
                return ['class' => 'success'];
            }
            if ($model->usedMinutePerMonth >= $model->project->setMinutePerMonth) {
                return ['class' => 'success'];
            }
            if ($model->usedCountRepeatErrorPerDay >= $model->project->setCountRepeatErrorPerDay) {
                return ['class' => 'info'];
            }
            if ($model->usedCountAnsweredCallPerDay >= $model->project->setCountAnsweredCallPerDay) {
                return ['class' => 'warning'];
            }
            if ($model->usedCountAnsweredCallPerMonth >= $model->project->setCountAnsweredCallPerMonth) {
                return ['class' => 'warning'];
            }


        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => 'yii\grid\CheckboxColumn', 'name' => 'numberFromViewToController', 'checkboxOptions' => function ($model) {
                return ['label' => '', 'value' => $model->aNumber];
            },
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}'
            ],

            'aNumber',
            'bNumber',
            [
                'attribute' => 'project_name',
                'value' => 'project.projectName',

            ],
//            [
//                'attribute' => 'sim_name',
//                'htmlHeader' => 'Some Header<span>aa</span>',
//                'header' => '<abbr title="Area Coordinating Team">ACT</abbr>',
//                'label' => 'title="Подсказка" gen<br/> sim',
//                'encodeLabel' => false,
//                'header' => 'Exam <br> Score',

//            'stateBLeg',
//            'stateALeg',
            [
                'attribute' => 'stateBLeg',
                'label' => 'state B',
                'format' => 'raw',
                'contentOptions' => function ($model) {
                    if ($model->stateBLeg == 'ANSWERED') {
                        return ['style' => 'background-color:#D4FF00'];
                    } elseif ($model->stateBLeg == 'PROGRESS') {
                        return ['style' => 'background-color:#FFFF00'];
                    } elseif ($model->stateBLeg == 'TRY') {
                        return ['style' => 'background-color:#FFD400'];
                    } else {
                        return ['style' => 'background-color:'];
                    }

                },

            ],
            [
                'attribute' => 'stateALeg',
                'label' => 'state A',
                'format' => 'raw',
                'contentOptions' => function ($model) {
                    if ($model->stateALeg == 'ANSWERED') {
                        return ['style' => 'background-color:#D4FF00'];
                    } elseif ($model->stateALeg == 'PROGRESS') {
                        return ['style' => 'background-color:#FFFF00'];
                    } elseif ($model->stateALeg == 'TRY') {
                        return ['style' => 'background-color:#FFD400'];
                    } else {
                        return ['style' => 'background-color:'];
                    }

                },

            ],


//            [
//                'attribute' => 'smb_sim_name',
//                'value' => 'smbSim.sim_name',
//                'label' => 'smb sim',
//            ],
//            [
//                'attribute' => 'smb_sim_login',
//                'format' => 'raw',
//                'label' => 'sim status',
//                'filter' => [
//                    0 => 'OFFLINE[0]',
//                    12 => 'OFFLINE[12]',
//                    11 => 'ONLINE',
//                    13 => 'IDLE',
//                    14 => 'BUSY',
//                ],
//                'value' => function ($model) {
//                    $active = $model->smbSim->sim_login;
//                    if ($active === 0 || $active === 12) {
//                        $content = 'OFFLINE(0)';
//                        $setClass = 'danger';
//                    } elseif ($active === 11) {
//                        $content = 'ONLINE(11)';
//                        $setClass = 'success';
//                    } elseif ($active === 13) {
//                        $content = 'IDLE(13)';
//                        $setClass = 'secondary';
//                    } elseif ($active === 14) {
//                        $content = 'BUSY(14)';
//                        $setClass = 'warning';
//                    } else {
//                        $content = 'NOSET';
//                        $setClass = 'info';
//                    }
//
//                    return \yii\helpers\Html::tag(
//                        'span',
//                        $content,
//                        [
//                            'class' => 'label label-' . $setClass
//                        ]
//                    );
//
//
//                },
//            ],

//            [
//                'attribute' => 'smb_dev_disable',
//                'label' => 'enable slot',
//                'format' => 'raw',
//                'filter' => [
//                    0 => 'Enable',
//                    1 => 'Disable',
//                ],
//                'value' => function ($model) {
//                    $active = $model->smbSim->dev_disable === 1;
//                    return \yii\helpers\Html::tag(
//                        'span',
//                        $active ? 'Disable' : 'Enable',
//                        [
//                            'class' => 'label label-' . ($active ? 'danger' : 'success'),
//                        ]
//                    );
//                },
//            ],
//            [
//                'attribute' => 'smb_sim_team_name',
//                'value' => 'smbSimTeam.sim_team_name',
//                'label' => 'smb group',
//            ],
//            [
//                'attribute' => 'smb_line_name',
//                'value' => 'smbSim.line_name',
//
//            ],
//            [
//                'attribute' => 'smb_device_oper',
//                'value' => 'smbDeviceLine.oper',
//                'label' => 'oper'
//            ],
//            [
//                'attribute' => 'smb_device_line_name',
//                'value' => 'smbDeviceLine.line_name',
//                'label' => 'goip line'
//
//            ],
//            [
//                'attribute' => 'smb_device_gsm_status',
//                'format' => 'raw',
//                'label' => 'gsm st',
//                'filter' => [
//                    0 => 'LOGOUT',
//                    30 => 'LOGOUT',
//                    31 => 'LOGIN',
//                ],
//                'value' => function ($model) {
//                    $active = $model->smbDeviceLine->gsm_status;
//                    if ($active === 0) {
//                        $content = 'LOGOUT(0)';
//                        $setClass = 'danger';
//                    } elseif ($active === 30) {
//                        $content = 'LOGOUT(12)';
//                        $setClass = 'danger';
//                    } elseif ($active === 31) {
//                        $content = 'LOGIN(31)';
//                        $setClass = 'success';
//                    } else {
//                        $content = 'NOSET(' . $active . ')';
//                        $setClass = 'info';
//                    }
//
//                    return \yii\helpers\Html::tag(
//                        'span',
//                        $content,
//                        [
//                            'class' => 'label label-' . $setClass
//                        ]
//                    );
//
//
//                },
//            ],
//            [
//
//                'attribute' => 'smb_device_line_status',
//                'format' => 'raw',
//                'label' => 'goip line st',
//                'filter' => [
//                    0 => 'OFFLINE',
//                    11 => 'ONLINE',
//                    20 => 'IDLE',
//                    21 => 'BUSY',
//                ],
//                'value' => function ($model) {
//                    $active = $model->smbDeviceLine->line_status;
//                    if ($active === 0) {
//                        $content = 'OFFLINE(0)';
//                        $setClass = 'danger';
//                    } elseif ($active === 11) {
//                        $content = 'ONLINE(12)';
//                        $setClass = 'success';
//                    } elseif ($active === 20) {
//                        $content = 'IDLE(31)';
//                        $setClass = 'success';
//                    } elseif ($active === 21) {
//                        $content = 'IDLE(31)';
//                        $setClass = 'warning';
//                    } else {
//                        $content = 'NOSET(' . $active . ')';
//                        $setClass = 'info';
//                    }
//
//                    return \yii\helpers\Html::tag(
//                        'span',
//                        $content,
//                        [
//                            'class' => 'label label-' . $setClass
//                        ]
//                    );
//
//
//                },
//            ],

            [


                'attribute' => 'aNumberEnable',
                'label' => 'Enable',
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
            [
                'headerOptions' => ['title' => 'разрешенное количество минут в день'],
                'attribute' => 'setMinutePerDay',
                'label' => 'sMpD',
                'footer' => PTotal::pageTotal($dataProvider->models, 'setMinutePerDay'),

            ],
            [
                'headerOptions' => ['title' => 'сегодня вызвонили минут'],
                'attribute' => 'usedMinutePerDay',
                'label' => 'uMpD',
                'footer' => PTotal::pageTotal($dataProvider->models, 'usedMinutePerDay'),
            ],


            [
                'headerOptions' => ['title' => 'Выговорено минут в месяц [usedMinutePerMonth]'],
                'attribute' => 'usedMinutePerMonth',
                'label' => 'uMpM',
                'footer' => PTotal::pageTotal($dataProvider->models, 'usedMinutePerMonth'),

            ],

            [
                'headerOptions' => ['title' => 'Выговорено минут тотально [usedTotalMinute]'],
                'attribute' => 'usedTotalMinute',
                'label' => 'uTM',
                'footer' => PTotal::pageTotal($dataProvider->models, 'usedTotalMinute'),

            ],
            [
                'headerOptions' => ['title' => 'накопленные ошибки за день [usedCountRepeatErrorPerDay]'],
                'attribute' => 'usedCountRepeatErrorPerDay',
                'label' => 'uCEpD',

            ],
            [
                'headerOptions' => ['title' => 'кол-во отвеченных звонков за день [usedCountAnsweredCallPerDay]'],
                'attribute' => 'usedCountAnsweredCallPerDay',
                'label' => 'uCACpD',
            ],
            [
                'headerOptions' => ['title' => 'кол-во отвеченных звонков за все время [usedCountAnsweredCallTotal]'],
                'attribute' => 'usedCountAnsweredCallTotal',
                'label' => 'uCACT',
            ],
            [
                'headerOptions' => ['title' => 'последняя попытка дозвона [lastTryDatetime]'],
                'format' => ['date', 'HH:mm:ss dd.MM'],
                'attribute' => 'lastTryDatetime',
                'label' => 'LTD',
            ],
            [
                'headerOptions' => ['title' => 'последняя успешная попытка дозвона [lastSuccessDatetime]'],
                'attribute' => 'lastSuccessDatetime',
                'format' => ['date', 'HH:mm:ss dd.MM'],
                'label' => 'lSD',
            ],
            'filename',
            'channel',
            'exten',
//            'uniqueidA',
//            'uniqueidB',
//            'projectId',
//            'aNumberEnable',
//            'setMinutePerDay',
//            'usedSecondPerDay',
//            'usedMinutePerDay',
//            'usedSecondPerMonth',
//            'usedMinutePerMonth',
//            'usedTotalSecond',
//            'usedTotalMinute',
//            'usedCountRepeatErrorPerDay',
//            'usedCountRepeatErrorTotal',
//            'usedCountAnsweredCallPerDay',
//            'usedCountAnsweredCallPerMonth',
//            'usedCountAnsweredCallTotal',
//            'lastTryDatetime',
//            'lastSuccessDatetime',
//            'createDatetime',
//            'describe',


        ],
    ]); ?>
    <?= Html::submitButton('Edit', ['class' => 'btn btn-primary']); ?>
    <?= Html::endForm(); ?>

    <br>
    <div>описание цветов:</div>
    <div class="bg-danger">проект/номер отключен</div>
    <div class="bg-success text-white">количество выговоренных минут в день/месяц привысило установленный порог на В
        номере
    </div>
    <div class="bg-info text-white">количество ошибок в день привысило установленный порог на В номере</div>
    <div class="bg-warning text-dark">количество отвеченных звонков привысило дневную/месячную установленный порог на В
        номере
    </div>