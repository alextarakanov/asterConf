<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GenStatisticsB */

$this->title = 'Create Gen Statistics B';
$this->params['breadcrumbs'][] = ['label' => 'Gen Statistics Bs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gen-statistics-b-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
