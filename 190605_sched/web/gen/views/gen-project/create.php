<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GenProject */

$this->title = 'Create Gen Project';
$this->params['breadcrumbs'][] = ['label' => 'Gen Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gen-project-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
