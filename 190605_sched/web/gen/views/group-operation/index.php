<?php

use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;

//echo '<pre>';
//var_dump($select);die;


foreach ($select as $item) {
    $data .= $item . ' ';

}

?>


    <div class="container">
        <div class="row">
            <span> <?= $data ?>  </span>

            <?php
            $form = ActiveForm::begin([
                'id' => 'form-input',
                'options' => [
                    'class' => 'form-horizontal col-lg-11',
                    'enctype' => 'multipart/form-data'
                ],
            ]);
            //            $form->dropDownList($model, 'wibble', $model->getPlayerlist(), array('class' => 'hidden', 'id' => 'venue_player_list'));
            //
                        $form->field($checkboxList, 'checkboxList')
                            ->checkboxList([
                                'a' => 'Элемент А',
                                'б' => 'Элемент Б',
                                'в' => 'Элемент В',
                            ]);


            ActiveForm::end();

            ?>
            <p> Обновить </p>
            <p></p>

            <?= Html::a('Rest all Day error', ['rest-all-day-error',  'side'=>'b'], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to rest all error',
                    'method' => 'post',
                ],
            ]) ?>
        </div>
    </div>
<?php
//echo '<pre>';
//var_dump($select);

?>