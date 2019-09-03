<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GenProjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gen-project-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'projectId') ?>

    <?= $form->field($model, 'projectName') ?>

    <?= $form->field($model, 'projectNameDescribe') ?>

    <?= $form->field($model, 'enableProject') ?>

    <?= $form->field($model, 'setMinimumConnectSecond') ?>

    <?php // echo $form->field($model, 'setMaximumConnectSecond') ?>

    <?php // echo $form->field($model, 'setMinimumMinutePerDay') ?>

    <?php // echo $form->field($model, 'setMaximumMinutePerDay') ?>

    <?php // echo $form->field($model, 'setMinutePerMonth') ?>

    <?php // echo $form->field($model, 'setCountRepeatErrorPerDay') ?>

    <?php // echo $form->field($model, 'setCountAnsweredCallPerDay') ?>

    <?php // echo $form->field($model, 'setCountAnsweredCallPerMonth') ?>

    <?php // echo $form->field($model, 'setTimeSuccessCallSeconds') ?>

    <?php // echo $form->field($model, 'setSoundDir') ?>

    <?php // echo $form->field($model, 'restMinuteEveryDay') ?>

    <?php // echo $form->field($model, 'restMinuteEveryMonth') ?>

    <?php // echo $form->field($model, 'usedCallLimitNow') ?>

    <?php // echo $form->field($model, 'setOutgoingSchedulerTrunk') ?>


    <?php // echo $form->field($model, 'createDatetime') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
