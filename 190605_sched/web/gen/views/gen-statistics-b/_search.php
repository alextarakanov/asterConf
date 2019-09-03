<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GenStatisticsBSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gen-statistics-b-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idStatistics') ?>

    <?= $form->field($model, 'projectId') ?>

    <?= $form->field($model, 'bNumber') ?>

    <?= $form->field($model, 'sim_name') ?>

    <?= $form->field($model, 'usedSecondPerDay') ?>

    <?php // echo $form->field($model, 'usedMinutePerDay') ?>

    <?php // echo $form->field($model, 'usedCountAnsweredCallPerDay') ?>

    <?php // echo $form->field($model, 'usedCountRepeatErrorPerDay') ?>

    <?php // echo $form->field($model, 'createDatetime') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
