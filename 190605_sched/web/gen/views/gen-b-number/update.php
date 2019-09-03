<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GenBNumber */

$this->title = 'Update Gen B Number: ' . $model->bNumber;
$this->params['breadcrumbs'][] = ['label' => 'Gen B Numbers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bNumber, 'url' => ['view', 'id' => $model->bNumber]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gen-bnumber-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
