<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GenProject */

$this->title = $model->projectId;
$this->params['breadcrumbs'][] = ['label' => 'Gen Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="gen-project-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->projectId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->projectId], [
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
            'projectId',
            'projectName',
            'projectNameDescribe',
//            'enableProject',
            [
                'attribute' => 'enableProject',
                'format' => 'raw',
                'value' => function ($model) {
                    $active = $model->enableProject === 1;
                    return \yii\helpers\Html::tag(
                        'span',
                        $active ? 'Yes' : 'No',
                        [
                            'class' => 'label label-' . ($active ? 'success' : 'danger'),
                        ]
                    );
                },
            ],
            'setMinimumConnectSecond',
            'setMaximumConnectSecond',
            'setMinimumMinutePerDay',
            'setMaximumMinutePerDay',
            'setMinutePerMonth',
            'setCountRepeatErrorPerDay',
            'setCountAnsweredCallPerDay',
            'setCountAnsweredCallPerMonth',
//            'setTimeSuccessCallSeconds:datetime',
            'setSoundDir',
            [
                'attribute' => 'restMinuteEveryDay',
                'format' => 'raw',
                'value' => function ($model) {
                    $active = $model->restMinuteEveryDay === 1;
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
                'attribute' => 'restMinuteEveryMonth',
                'format' => 'raw',
                'value' => function ($model) {
                    $active = $model->restMinuteEveryMonth === 1;
                    return \yii\helpers\Html::tag(
                        'span',
                        $active ? 'Yes' : 'No',
                        [
                            'class' => 'label label-' . ($active ? 'success' : 'danger'),
                        ]
                    );
                },
            ],
            'usedCallLimitNow',
            [
                'attribute' => 'setOutgoingSchedulerTrunk',
                'format' => 'raw',
                'value' => function ($model) {
                    $active = $model->setOutgoingSchedulerTrunk === 1;
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
    ]) ?>

</div>
