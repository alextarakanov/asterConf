<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GenBNumberSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gen-bnumber-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'bNumber') ?>

    <?= $form->field($model, 'aNumber') ?>

    <?= $form->field($model, 'sim_name') ?>

    <?= $form->field($model, 'stateALeg') ?>

    <?= $form->field($model, 'stateBLeg') ?>

    <?php // echo $form->field($model, 'uniqueidA') ?>

    <?php // echo $form->field($model, 'uniqueidB') ?>

    <?php // echo $form->field($model, 'filename') ?>

    <?php // echo $form->field($model, 'projectId') ?>

    <?php // echo $form->field($model, 'bNumberEnable') ?>

    <?php // echo $form->field($model, 'setMinutePerDay') ?>

    <?php // echo $form->field($model, 'usedSecondPerDay') ?>

    <?php // echo $form->field($model, 'usedMinutePerDay') ?>

    <?php // echo $form->field($model, 'usedSecondPerMonth') ?>

    <?php // echo $form->field($model, 'usedMinutePerMonth') ?>

    <?php // echo $form->field($model, 'usedTotalSecond') ?>

    <?php // echo $form->field($model, 'usedTotalMinute') ?>

    <?php // echo $form->field($model, 'usedCountRepeatErrorPerDay') ?>

    <?php // echo $form->field($model, 'usedCountRepeatErrorTotal') ?>

    <?php // echo $form->field($model, 'usedCountAnsweredCallPerDay') ?>

    <?php // echo $form->field($model, 'usedCountAnsweredCallPerMonth') ?>

    <?php // echo $form->field($model, 'usedCountAnsweredCallTotal') ?>

    <?php // echo $form->field($model, 'lastTryDatetime') ?>

    <?php // echo $form->field($model, 'lastSuccessDatetime') ?>

    <?php // echo $form->field($model, 'createDatetime') ?>

    <?php // echo $form->field($model, 'describe') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
