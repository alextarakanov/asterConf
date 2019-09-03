<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GenProject */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gen-project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'projectName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'projectNameDescribe')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enableProject')->dropDownList(['1'=>'YES', '0'=>'NO']) ?>


    <?= $form->field($model, 'setMinimumConnectSecond')->textInput() ?>

    <?= $form->field($model, 'setMaximumConnectSecond')->textInput() ?>

    <?= $form->field($model, 'setMinimumMinutePerDay')->textInput() ?>

    <?= $form->field($model, 'setMaximumMinutePerDay')->textInput() ?>

    <?= $form->field($model, 'setMinutePerMonth')->textInput() ?>

    <?= $form->field($model, 'setCountRepeatErrorPerDay')->textInput() ?>

    <?= $form->field($model, 'setCountAnsweredCallPerDay')->textInput() ?>

    <?= $form->field($model, 'setCountAnsweredCallPerMonth')->textInput() ?>

<!--    <?//= $form->field($model, 'setTimeSuccessCallSeconds')->textInput() ?> -->

    <?= $form->field($model, 'setSoundDir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'restMinuteEveryDay')->dropDownList(['1'=>'YES', '0'=>'NO']) ?>

    <?= $form->field($model, 'restMinuteEveryMonth')->dropDownList(['1'=>'YES', '0'=>'NO']) ?>

    <?= $form->field($model, 'usedCallLimitNow')->textInput() ?>

    <?= $form->field($model, 'setOutgoingSchedulerTrunk')->dropDownList(['1'=>'YES', '0'=>'NO']) ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
