<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GenSched */

$this->title = 'Create Gen Sched';
$this->params['breadcrumbs'][] = ['label' => 'Gen Scheds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gen-sched-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
