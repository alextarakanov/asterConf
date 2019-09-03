<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\PTotal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GenBNumberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
//echo '<pre>'; var_dump($dataProvider);die;
$this->title = 'Gen B Numbers';
$this->params['breadcrumbs'][] = $this->title;
/*
 * sim.sim_login
 * 0 - OFFLINE
 * 11 - ONLINE
 * 12 - OFFLINE
 * 13 - IDLE
 * 14 - BUSY

 *
 * device_line.line_status
 * 0 - OFFLINE
 * 11 - ONLINE
 * 20 - IDLE
 * 21 - BUSY
 *
 * device_line.gsm_status
 * 0 - LOGOUT
 * 30 - LOGOUT
 * 31 - LOGIN
 * :
 */
//echo '<pre>'; var_dump($this);die;
?>
<div class="gen-bnumber-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Gen B Number', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Export', ['export/export-b-number'], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Import', ['import/upload', 'table' => 'genBNumber', 'side' => 'b'], ['class' => 'btn btn-info']) ?>

        <?= Html::a('Delete ALL', ['all-delete', 'side' => 'b'], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete all data from tables?',
                'method' => 'post',
            ],
        ]) ?>


    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= Html::beginForm(['gen-b-number/group'], 'post'); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showFooter' => true,

        'rowOptions' => function ($model, $key, $index, $column) {
            if ($model->project->enableProject === 0) {
                return ['class' => 'danger'];
            }
            if ($model->bNumberEnable === 0) {
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
                return ['label' => '', 'value' => $model->bNumber];
            },
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}'
            ],

            'bNumber',
            'aNumber',
            [
                'attribute' => 'project_name',
                'value' => 'project.projectName',
//                'alte' => 'sssssdsfdfsdfs',

            ],
            [
                'headerOptions' => ['title' => 'sim карта привязанная к этому номеру [gen_bNumber.sim_name]'],
                'attribute' => 'sim_name',
                'label' => 'gen sim',

            ],
//            'sim_name',
//            'stateBLeg',
//            'stateALeg',
//            [
//                'attribute' => 'stateALeg',
//                'label' => 'state A',
//
//            ],
            [
                'attribute' => 'stateALeg',
                'label' => 'state A',
                'format' => 'raw',
                'filter' => [
                    'ANSWERED' => 'ANSWERED',
                    'IDLE' => 'IDLE',
                    'TRY' => 'TRY',
                    'PROGRESS' => 'PROGRESS',
                    99 => 'NOT IDLE',
                ],
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
            [
                'attribute' => 'stateBLeg',
                'label' => 'state B',
                'format' => 'raw',
                'filter' => [
                    'ANSWERED' => 'ANSWERED',
                    'IDLE' => 'IDLE',
                    'TRY' => 'TRY',
                    'PROGRESS' => 'PROGRESS',
                    99 => 'NOT IDLE',
                ],
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
                'attribute' => 'smb_sim_name',
                'value' => 'smbSim.sim_name',
                'label' => 'smb sim',
            ],
            [
                'attribute' => 'smb_sim_login',
                'format' => 'raw',
                'label' => 'sim status',
                'filter' => [
                    0 => 'OFFLINE[0]',
                    12 => 'OFFLINE[12]',
                    11 => 'ONLINE',
                    13 => 'IDLE',
                    14 => 'BUSY',
                ],
                'value' => function ($model) {
                    $active = $model->smbSim->sim_login;
                    if ($active === 0 || $active === 12) {
                        $content = 'OFFLINE(0)';
                        $setClass = 'danger';
                    } elseif ($active === 11) {
                        $content = 'ONLINE(11)';
                        $setClass = 'success';
                    } elseif ($active === 13) {
                        $content = 'IDLE(13)';
                        $setClass = 'secondary';
                    } elseif ($active === 14) {
                        $content = 'BUSY(14)';
                        $setClass = 'warning';
                    } else {
                        $content = 'NOSET';
                        $setClass = 'info';
                    }

                    return \yii\helpers\Html::tag(
                        'span',
                        $content,
                        [
                            'class' => 'label label-' . $setClass
                        ]
                    );


                },
            ],

            [
                'attribute' => 'smb_dev_disable',
                'label' => 'enable slot',
                'format' => 'raw',
                'filter' => [
                    0 => 'Enable',
                    1 => 'Disable',
                ],
                'value' => function ($model) {
                    $active = $model->smbSim->dev_disable === 1;
                    return \yii\helpers\Html::tag(
                        'span',
                        $active ? 'Disable' : 'Enable',
                        [
                            'class' => 'label label-' . ($active ? 'danger' : 'success'),
                        ]
                    );
                },
            ],
            [
                'attribute' => 'smb_sim_team_name',
                'value' => 'smbSimTeam.sim_team_name',
                'label' => 'smb group',
            ],
            [
                'attribute' => 'usedErrorLoginSimChannel',
                'value' => 'usedErrorLoginSimChannel',
                'headerOptions' => ['title' => 'кол-во раз не смогли залогиниться [usedErrorLoginSimChannel]'],
                'label' => 'err login',
                'contentOptions' => function ($model) {
                    if ($model->usedErrorLoginSimChannel == 2) {
                        return ['style' => 'background-color:#FF8A7F'];
                    } elseif ($model->usedErrorLoginSimChannel == 3) {
                        return ['style' => 'background-color:#C35A50'];
                    } elseif ($model->usedErrorLoginSimChannel > 3) {
                        return ['style' => 'background-color:#95453E'];
                    } else {
                        return ['style' => 'background-color:'];
                    }

                },

            ],
            [
                'attribute' => 'smb_line_name',
                'value' => 'smbSim.line_name',

            ],
            [
                'attribute' => 'smb_device_oper',
                'value' => 'smbDeviceLine.oper',
                'label' => 'oper'
            ],
            [
                'attribute' => 'smb_device_line_name',
                'value' => 'smbDeviceLine.line_name',
                'label' => 'goip line'

            ],
            [

                'attribute' => 'smb_device_gsm_status',
                'format' => 'raw',
                'label' => 'gsm st',
                'filter' => [
                    0 => 'LOGOUT',
                    30 => 'LOGOUT',
                    31 => 'LOGIN',
                ],
                'value' => function ($model) {
                    $active = $model->smbDeviceLine->gsm_status;
                    if ($active === 0) {
                        $content = 'LOGOUT(0)';
                        $setClass = 'danger';
                    } elseif ($active === 30) {
                        $content = 'LOGOUT(30)';
                        $setClass = 'danger';
                    } elseif ($active === 31) {
                        $content = 'LOGIN(31)';
                        $setClass = 'success';
                    } else {
                        $content = 'NOSET(' . $active . ')';
                        $setClass = 'info';
                    }

                    return \yii\helpers\Html::tag(
                        'span',
                        $content,
                        [
                            'class' => 'label label-' . $setClass
                        ]
                    );


                },
            ],
            [

                'attribute' => 'smb_device_line_status',
                'format' => 'raw',
                'label' => 'goip line st',
                'filter' => [
                    0 => 'OFFLINE',
                    11 => 'ONLINE',
                    20 => 'IDLES',
                    21 => 'BUSY',
                    99 => 'ON&IDLE',
                ],
                'value' => function ($model) {
                    $active = $model->smbDeviceLine->line_status;
                    if ($active === 0) {
                        $content = 'OFFLINE(0)';
                        $setClass = 'danger';
                    } elseif ($active === 11 || $active === 20) {
                        $content = 'ONLINE(' . $active . ')';
                        $setClass = 'success';
//                    } elseif ($active === 20) {
//                        $content = 'IDLE(20)';
//                        $setClass = 'success';
                    } elseif ($active === 21) {
                        $content = 'IDLE(31)';
                        $setClass = 'warning';
                    } else {
                        $content = 'NOSET(' . $active . ')';
                        $setClass = 'info';
                    }

                    return \yii\helpers\Html::tag(
                        'span',
                        $content,
                        [
                            'class' => 'label label-' . $setClass
                        ]
                    );


                },
            ],

            [


                'attribute' => 'bNumberEnable',
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
                'contentOptions' => function ($model) {
                    if ($model->usedMinutePerDay >= $model->setMinutePerDay) {
                        return ['style' => 'background-color:#8B0000'];
                    } else {
                        return ['style' => 'background-color:'];
                    }
                },
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
                'label' => 'uMT',
                'footer' => PTotal::pageTotal($dataProvider->models, 'usedTotalMinute'),

            ],


            [
                'attribute' => 'ACD',
//                'value' => 'GenBNumber::ACD',
                'label' => 'ACD',
                'footer' => PTotal::pageAverage($dataProvider->models, 'ACD'),


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
//            'bNumberEnable',
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


</div>
