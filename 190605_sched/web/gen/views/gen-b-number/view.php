<?php

use app\models\GenProject;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\GenBNumber */

$this->title = $model->bNumber;
$this->params['breadcrumbs'][] = ['label' => 'Gen B Numbers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$project = GenProject::find()->all();
$projectName = ArrayHelper::map($project, 'projectId', 'projectName');

?>
<div class="gen-bnumber-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->bNumber], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->bNumber], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'bNumber',
            'sim_name',
            [
                'attribute' => 'smb_sim_login',
                'format' => 'raw',
                'filter' => [
                    0 => 'OFFLINE',
                    12 => 'OFFLINE',
                    11 => 'ONLINE',
                    13 => 'IDLE',
                    14 => 'BUSY',
                ],
                'value' => function ($model) {
                    $active = $model->smbSim->sim_login;
                    if ($active === 0) {
                        $content = 'OFFLINE(0)';
                        $setClass = 'danger';
                    } elseif ($active === 12) {
                        $content = 'OFFLINE(12)';
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

                'attribute' => 'smb_device_gsm_status',
                'format' => 'raw',
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
                        $content = 'LOGOUT(12)';
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
                'value' => function ($model) {
                    $active = $model->smbDeviceLine->line_status;
                    if ($active === 0) {
                        $content = 'OFFLINE(0)';
                        $setClass = 'danger';
                    } elseif ($active === 11) {
                        $content = 'ONLINE(12)';
                        $setClass = 'success';
                    } elseif ($active === 20) {
                        $content = 'IDLE(31)';
                        $setClass = 'success';
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
                'format' => 'raw',
                'value' => function ($model) {
                    $active = $model->bNumberEnable === 1;
                    return \yii\helpers\Html::tag(
                        'span',
                        $active ? 'Yes' : 'No',
                        [
                            'class' => 'label label-' . ($active ? 'success' : 'danger'),
                        ]
                    );
                },
            ],

            'describe',
            'project.projectName',
//            'setMinutePerDay',
            [
                'attribute' => 'setMinutePerDay',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->setMinutePerDay. ' minutes';
                },

            ],
            'smbSimTeam.sim_team_name',
            'smbDeviceLine.oper',
            'stateALeg',
            'stateBLeg',
            'aNumber',
            'uniqueidA',
            'uniqueidB',
            'filename',
            'projectId',
//            'bNumberEnable',
            'usedSecondPerDay',
            'usedMinutePerDay',
            'usedSecondPerMonth',
            'usedMinutePerMonth',
            'usedTotalSecond',
            'usedTotalMinute',
            'usedCountRepeatErrorPerDay',
            'usedCountRepeatErrorTotal',
            'usedCountAnsweredCallPerDay',
            'usedCountAnsweredCallPerMonth',
            'usedCountAnsweredCallTotal',
            'lastTryDatetime',
            'lastSuccessDatetime',
            'createDatetime',
            'channel',
            'exten',

        ],
    ]) ?>

</div>
