<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GenStatisticsB */

$this->title = 'Update Gen Statistics B: ' . $model->idStatistics;
$this->params['breadcrumbs'][] = ['label' => 'Gen Statistics Bs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idStatistics, 'url' => ['view', 'id' => $model->idStatistics]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gen-statistics-b-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
