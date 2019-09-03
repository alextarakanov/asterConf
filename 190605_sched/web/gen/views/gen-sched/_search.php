<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GenSchedSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gen-sched-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'projectId') ?>

    <?= $form->field($model, '00b30') ?>

    <?= $form->field($model, '00a30') ?>

    <?= $form->field($model, '01b30') ?>

    <?= $form->field($model, '01a30') ?>

    <?php // echo $form->field($model, '02b30') ?>

    <?php // echo $form->field($model, '02a30') ?>

    <?php // echo $form->field($model, '03b30') ?>

    <?php // echo $form->field($model, '03a30') ?>

    <?php // echo $form->field($model, '04b30') ?>

    <?php // echo $form->field($model, '04a30') ?>

    <?php // echo $form->field($model, '05b30') ?>

    <?php // echo $form->field($model, '05a30') ?>

    <?php // echo $form->field($model, '06b30') ?>

    <?php // echo $form->field($model, '06a30') ?>

    <?php // echo $form->field($model, '07b30') ?>

    <?php // echo $form->field($model, '07a30') ?>

    <?php // echo $form->field($model, '08b30') ?>

    <?php // echo $form->field($model, '08a30') ?>

    <?php // echo $form->field($model, '09b30') ?>

    <?php // echo $form->field($model, '09a30') ?>

    <?php // echo $form->field($model, '10b30') ?>

    <?php // echo $form->field($model, '10a30') ?>

    <?php // echo $form->field($model, '11b30') ?>

    <?php // echo $form->field($model, '11a30') ?>

    <?php // echo $form->field($model, '12b30') ?>

    <?php // echo $form->field($model, '12a30') ?>

    <?php // echo $form->field($model, '13b30') ?>

    <?php // echo $form->field($model, '13a30') ?>

    <?php // echo $form->field($model, '14b30') ?>

    <?php // echo $form->field($model, '14a30') ?>

    <?php // echo $form->field($model, '15b30') ?>

    <?php // echo $form->field($model, '15a30') ?>

    <?php // echo $form->field($model, '16b30') ?>

    <?php // echo $form->field($model, '16a30') ?>

    <?php // echo $form->field($model, '17b30') ?>

    <?php // echo $form->field($model, '17a30') ?>

    <?php // echo $form->field($model, '18b30') ?>

    <?php // echo $form->field($model, '18a30') ?>

    <?php // echo $form->field($model, '19b30') ?>

    <?php // echo $form->field($model, '19a30') ?>

    <?php // echo $form->field($model, '20b30') ?>

    <?php // echo $form->field($model, '20a30') ?>

    <?php // echo $form->field($model, '21b30') ?>

    <?php // echo $form->field($model, '21a30') ?>

    <?php // echo $form->field($model, '22b30') ?>

    <?php // echo $form->field($model, '22a30') ?>

    <?php // echo $form->field($model, '23b30') ?>

    <?php // echo $form->field($model, '23a30') ?>

    <?php // echo $form->field($model, '24b30') ?>

    <?php // echo $form->field($model, '24a30') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
