<?php

use app\models\GenProject;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\GenBNumber */
/* @var $form yii\widgets\ActiveForm */
$project = GenProject::find()->all();
$projectName = ArrayHelper::map($project,'projectId','projectName');
//var_dump($projectName);die;
$params = [
    'prompt' => 'Set project Name'
];
?>

<div class="gen-bnumber-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'bNumberEnable')->checkbox([ 'checked ' => false])->label('Enable');?>

    <?= $form->field($model, 'projectId')->dropDownList($projectName,$params) ?>
    <?= $form->field($model, 'bNumber')->textInput() ?>

    <?= $form->field($model, 'aNumber')->textInput(['readonly'=> true]) ?>

    <?= $form->field($model, 'sim_name')->textInput() ?>

<!--    <?//= $form->field($model, 'stateALeg')->textInput(['maxlength' => true]) ?> -->
    <?= $form->field($model, 'stateALeg')->dropDownList([null=>"", 'IDLE'=>"IDLE"]) ?>


<!--    <?//= $form->field($model, 'stateBLeg')->textInput(['maxlength' => true]) ?> -->
    <?= $form->field($model, 'stateBLeg')->dropDownList([null=>"", 'IDLE'=>"IDLE"]) ?>

    <?= $form->field($model, 'uniqueidA')->textInput(['maxlength' => true,'readonly'=> true]) ?>

    <?= $form->field($model, 'uniqueidB')->textInput(['maxlength' => true,'readonly'=> true]) ?>

    <?= $form->field($model, 'filename')->textInput(['maxlength' => true,'readonly'=> true]) ?>

<!--    <?//= $form->field($model, 'projectId')->textInput() ?> -->

<!--    <?//= $form->field($model, 'bNumberEnable')->textInput() ?> -->

    <?= $form->field($model, 'setMinutePerDay')->textInput() ?>

    <?= $form->field($model, 'usedSecondPerDay')->textInput() ?>

    <?= $form->field($model, 'usedMinutePerDay')->textInput() ?>

    <?= $form->field($model, 'usedSecondPerMonth')->textInput() ?>

    <?= $form->field($model, 'usedMinutePerMonth')->textInput() ?>

    <?= $form->field($model, 'usedTotalSecond')->textInput() ?>

    <?= $form->field($model, 'usedTotalMinute')->textInput() ?>

    <?= $form->field($model, 'usedCountRepeatErrorPerDay')->textInput() ?>

    <?= $form->field($model, 'usedCountRepeatErrorTotal')->textInput() ?>

    <?= $form->field($model, 'usedCountAnsweredCallPerDay')->textInput() ?>

    <?= $form->field($model, 'usedCountAnsweredCallPerMonth')->textInput() ?>

    <?= $form->field($model, 'usedCountAnsweredCallTotal')->textInput() ?>

    <?= $form->field($model, 'lastTryDatetime')->textInput() ?>

    <?= $form->field($model, 'lastSuccessDatetime')->textInput() ?>

    <?= $form->field($model, 'createDatetime')->textInput() ?>

    <?= $form->field($model, 'describe')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'usedErrorLoginSimChannel')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
