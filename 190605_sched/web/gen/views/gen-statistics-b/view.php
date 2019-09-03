<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GenStatisticsB */

$this->title = $model->idStatistics;
$this->params['breadcrumbs'][] = ['label' => 'Gen Statistics Bs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="gen-statistics-b-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idStatistics], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idStatistics], [
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
            'idStatistics',
            'projectId',
            'bNumber',
            'sim_name',
            'usedSecondPerDay',
            'usedMinutePerDay',
            'usedCountAnsweredCallPerDay',
            'usedCountRepeatErrorPerDay',
            'createDatetime',
        ],
    ]) ?>

</div>
