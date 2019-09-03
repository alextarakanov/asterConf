<?php

use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;


//echo '<pre>';
//var_dump($select);die;
$this->registerJsFile('/js/checkbox.js');

foreach ($model->numberFromViewToController as $item) {
    $data .= $item . ' ';

}
?>


    <div class="row">
        <div class="alert alert-success"> <?= $data ?>  </div>
    </div>
    <div class="row">
        <?php
        $form = ActiveForm::begin([
            'id' => 'form-input',
            'options' => [
                'class' => 'form-horizontal col-lg-11',
                'enctype' => 'multipart/form-data'
            ],
        ]); ?>
        <div class="col-md-3">


            <?= $form->field($model, 'projectId')->dropDownList($projectIDtoName) ?>
            <div class="bg-danger text-white">
            <?= $form->field($model, 'restProjectId')->checkbox(['checked' => false, 'label' => 'Поменять группу']); ?>
            </div>
            <hr>
            <?= $form->field($model, 'aNumberEnable')->dropDownList([
                '0' => 'отключить',
                '1' => 'включить',
                '3' => 'не изменять текущее состояние',
            ],
                [
                    'value' => '3',
                ])->label('включить/отключить номер') ?>
            <hr>


        </div>

        <div class="col-md-4 col-md-offset-2">
            <?= $form->field($model, 'restUsedCountRepeatErrorPerDay')->checkbox(['checked' => false, 'label' => 'Сбросить ошибки за день']); ?>
            <?= $form->field($model, 'restUsedCountRepeatErrorTotal')->checkbox(['checked' => false, 'label' => 'Сбросить ошибки за все время']); ?>
            <hr>
            <?= $form->field($model, 'restUsedCountAnsweredCallPerDay')->checkbox(['checked' => false, 'label' => 'Сбросить счетчик ответов за день']); ?>
            <?= $form->field($model, 'restUsedCountAnsweredCallPerMonth')->checkbox(['checked' => false, 'label' => 'Сбросить счетчик ответов за месяц']); ?>
            <?= $form->field($model, 'restUsedCountAnsweredCallTotal')->checkbox(['checked' => false, 'label' => 'Сбросить счетчик ответов за все время']); ?>
            <hr>
            <?= $form->field($model, 'restUsedMinutePerDay')->checkbox(['checked' => false, 'label' => 'Сбросить cчетчик минут за день']); ?>
            <?= $form->field($model, 'restUsedMinutePerMonth')->checkbox(['checked' => false, 'label' => 'Сбросить cчетчик минут за месяц']); ?>
            <?= $form->field($model, 'restUsedTotalMinute')->checkbox(['checked' => false, 'label' => 'Сбросить cчетчик минут за все время ']); ?>
            <hr>
            <?= $form->field($model, 'stateALeg')->checkbox(['checked' => false, 'label' => 'установить A Leg в состояние IDLE ']); ?>
            <?= $form->field($model, 'stateBLeg')->checkbox(['checked' => false, 'label' => 'установить B Leg в состояние IDLE ']); ?>
            <hr>
            <?= $form->field($model, 'delete')->checkbox(['checked' => false, 'label' => '!!!УДАЛИТЬ!!! ']); ?>
            <hr>
            <?= $form->field($model, 'setMinutePerDayStart')->textInput(['value' => 60])->label('Задать количество минут в день минимум'); ?>
            <?= $form->field($model, 'setMinutePerDayStop')->textInput(['value' => 120])->label('Задать количество минут в день максимум'); ?>
            <div class="bg-danger text-white">
            <?= $form->field($model, 'restSetMinutePerDay')->checkbox(['checked' => false, 'label' => 'Зафиксировать кол-во минут в день ']); ?>
            </div>
            <div style='display:none;'>
            <?php foreach ($model->numberFromViewToController as $item): ?>
                <?php echo $form->field($model, 'numberFromViewToController', ['template' => '{input}'])->hiddenInput(['name' => 'numberFromViewToController[]', 'value' => $item])->label('') ?>
            <?php endforeach; ?>
            </div>
            <input id="form-input" type="checkbox" name="checked" value="all" onclick="checkAll(this)"/><label
                    for="one">Установить/снять всё</label>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <?= Html::submitButton('Send', [
                'class' => 'btn btn-success',
//                'data' => [
//                    'confirm' => 'Are you sure that all right?',
//                    'method' => 'post',
//                ],

            ]) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

<?php
//echo '<pre>';
//var_dump($select);

?>