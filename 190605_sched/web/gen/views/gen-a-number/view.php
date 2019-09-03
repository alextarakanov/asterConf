<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GenANumber */

$this->title = $model->aNumber;
$this->params['breadcrumbs'][] = ['label' => 'Gen A Numbers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="gen-anumber-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->aNumber], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->aNumber], [
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
            'aNumber',
            'bNumber',
            'sim_name',
            'stateALeg',
            'stateBLeg',
            'uniqueidA',
            'uniqueidB',
            'filename',
            'projectId',
            'aNumberEnable',
            'setMinutePerDay',
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
            'describe',
            'channel',
            'exten',

        ],
    ]) ?>

</div>
