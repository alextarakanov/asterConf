<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GenANumber */

$this->title = 'Update Gen A Number: ' . $model->aNumber;
$this->params['breadcrumbs'][] = ['label' => 'Gen A Numbers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->aNumber, 'url' => ['view', 'id' => $model->aNumber]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gen-anumber-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
