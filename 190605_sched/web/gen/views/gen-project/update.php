<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GenProject */

$this->title = 'Update Gen Project: ' . $model->projectId;
$this->params['breadcrumbs'][] = ['label' => 'Gen Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->projectId, 'url' => ['view', 'id' => $model->projectId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gen-project-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
