<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GenStatisticsA */

$this->title = 'Update Gen Statistics A: ' . $model->idStatistics;
$this->params['breadcrumbs'][] = ['label' => 'Gen Statistics As', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idStatistics, 'url' => ['view', 'id' => $model->idStatistics]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gen-statistics-a-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
