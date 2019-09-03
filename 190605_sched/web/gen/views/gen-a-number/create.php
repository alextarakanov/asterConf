<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GenANumber */

$this->title = 'Create Gen A Number';
$this->params['breadcrumbs'][] = ['label' => 'Gen A Numbers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gen-anumber-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
