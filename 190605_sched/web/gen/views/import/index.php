<?php

use yii\widgets\ActiveForm;
use yii\helpers\Url;


if ($table === 'genBNumber') {
    $url = yii\helpers\Html::a('образец файла UTF-8', ["/files/genBNumber.csv"], ['class' => 'big-button']);
    $url2 = yii\helpers\Html::a('образец файла UTF-8 c формулой для генерации номеров в таблице genGNumber', ["/files/template.xlsx"], ['class' => 'big-button']);
    $line = array('bNumber' => 'В - номер, куда звоним', 'projectId' => 'id проекта', 'sim_name' => '2003201', 'bNumberEnable' => 1, 'setMinutePerDay' => '555', 'describe' => 'описание номера');

} elseif ($table === 'genANumber') {
    $url = yii\helpers\Html::a('образец файла UTF-8', ["/files/genBNumber.csv"], ['class' => 'big-button']);
    $url2 = yii\helpers\Html::a('образец файла UTF-8 c формулой для генерации номеров в таблице genGNumber', ["/files/template.xlsx"], ['class' => 'big-button']);
    $line = array('aNumber' => 'A - номер, откуда звоним', 'projectId' => 'id проекта', 'sim_name' => '2003201', 'aNumberEnable' => 1, 'setMinutePerDay' => '555', 'describe' => 'описание номера');

}


?>
<h1> заливаем в таблицу <?= $table ?> данные </h1>


<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<?= $form->field($model, 'uploadTableFile')->fileInput() ?>

<button>Submit</button>

<?php ActiveForm::end();

echo \yii\widgets\DetailView::widget([
    'model' => $line,
    'attributes' => array_keys($line),
]);
?>

<div class="container">
    <div class="row">
        <p>  <?= $url ?> </p>
        <p>  <?= $url2 ?> </p>
    </div>
</div>