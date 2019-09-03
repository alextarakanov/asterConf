<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GenStatisticsA */

$this->title = 'Create Gen Statistics A';
$this->params['breadcrumbs'][] = ['label' => 'Gen Statistics As', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gen-statistics-a-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
