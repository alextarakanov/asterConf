<?php

use app\models\GenProject;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\GenSched */
/* @var $form yii\widgets\ActiveForm */
$project = GenProject::find()->all();
$projectName = ArrayHelper::map($project,'projectId','projectName');
//var_dump($projectName);die;
$params = [
    'prompt' => 'Set project Name'
];
?>

<div class="gen-sched-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'projectId')->dropDownList($projectName,$params) ?>


    <?= $form->field($model, '00b30')->textInput() ?>

    <?= $form->field($model, '00a30')->textInput() ?>

    <?= $form->field($model, '01b30')->textInput() ?>

    <?= $form->field($model, '01a30')->textInput() ?>

    <?= $form->field($model, '02b30')->textInput() ?>

    <?= $form->field($model, '02a30')->textInput() ?>

    <?= $form->field($model, '03b30')->textInput() ?>

    <?= $form->field($model, '03a30')->textInput() ?>

    <?= $form->field($model, '04b30')->textInput() ?>

    <?= $form->field($model, '04a30')->textInput() ?>

    <?= $form->field($model, '05b30')->textInput() ?>

    <?= $form->field($model, '05a30')->textInput() ?>

    <?= $form->field($model, '06b30')->textInput() ?>

    <?= $form->field($model, '06a30')->textInput() ?>

    <?= $form->field($model, '07b30')->textInput() ?>

    <?= $form->field($model, '07a30')->textInput() ?>

    <?= $form->field($model, '08b30')->textInput() ?>

    <?= $form->field($model, '08a30')->textInput() ?>

    <?= $form->field($model, '09b30')->textInput() ?>

    <?= $form->field($model, '09a30')->textInput() ?>

    <?= $form->field($model, '10b30')->textInput() ?>

    <?= $form->field($model, '10a30')->textInput() ?>

    <?= $form->field($model, '11b30')->textInput() ?>

    <?= $form->field($model, '11a30')->textInput() ?>

    <?= $form->field($model, '12b30')->textInput() ?>

    <?= $form->field($model, '12a30')->textInput() ?>

    <?= $form->field($model, '13b30')->textInput() ?>

    <?= $form->field($model, '13a30')->textInput() ?>

    <?= $form->field($model, '14b30')->textInput() ?>

    <?= $form->field($model, '14a30')->textInput() ?>

    <?= $form->field($model, '15b30')->textInput() ?>

    <?= $form->field($model, '15a30')->textInput() ?>

    <?= $form->field($model, '16b30')->textInput() ?>

    <?= $form->field($model, '16a30')->textInput() ?>

    <?= $form->field($model, '17b30')->textInput() ?>

    <?= $form->field($model, '17a30')->textInput() ?>

    <?= $form->field($model, '18b30')->textInput() ?>

    <?= $form->field($model, '18a30')->textInput() ?>

    <?= $form->field($model, '19b30')->textInput() ?>

    <?= $form->field($model, '19a30')->textInput() ?>

    <?= $form->field($model, '20b30')->textInput() ?>

    <?= $form->field($model, '20a30')->textInput() ?>

    <?= $form->field($model, '21b30')->textInput() ?>

    <?= $form->field($model, '21a30')->textInput() ?>

    <?= $form->field($model, '22b30')->textInput() ?>

    <?= $form->field($model, '22a30')->textInput() ?>

    <?= $form->field($model, '23b30')->textInput() ?>

    <?= $form->field($model, '23a30')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
