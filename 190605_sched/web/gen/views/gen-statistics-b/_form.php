<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GenStatisticsB */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gen-statistics-b-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'projectId')->textInput() ?>

    <?= $form->field($model, 'bNumber')->textInput() ?>

    <?= $form->field($model, 'sim_name')->textInput() ?>

    <?= $form->field($model, 'usedSecondPerDay')->textInput() ?>

    <?= $form->field($model, 'usedMinutePerDay')->textInput() ?>

    <?= $form->field($model, 'usedCountAnsweredCallPerDay')->textInput() ?>

    <?= $form->field($model, 'usedCountRepeatErrorPerDay')->textInput() ?>

    <?= $form->field($model, 'createDatetime')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
