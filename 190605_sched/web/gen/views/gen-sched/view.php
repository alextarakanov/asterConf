<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GenSched */

$this->title = $model->projectId;
$this->params['breadcrumbs'][] = ['label' => 'Gen Scheds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="gen-sched-view">

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
            '00b30',
            '00a30',
            '01b30',
            '01a30',
            '02b30',
            '02a30',
            '03b30',
            '03a30',
            '04b30',
            '04a30',
            '05b30',
            '05a30',
            '06b30',
            '06a30',
            '07b30',
            '07a30',
            '08b30',
            '08a30',
            '09b30',
            '09a30',
            '10b30',
            '10a30',
            '11b30',
            '11a30',
            '12b30',
            '12a30',
            '13b30',
            '13a30',
            '14b30',
            '14a30',
            '15b30',
            '15a30',
            '16b30',
            '16a30',
            '17b30',
            '17a30',
            '18b30',
            '18a30',
            '19b30',
            '19a30',
            '20b30',
            '20a30',
            '21b30',
            '21a30',
            '22b30',
            '22a30',
            '23b30',
            '23a30',

        ],
    ]) ?>

</div>
