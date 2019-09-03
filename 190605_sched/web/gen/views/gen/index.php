<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GenSchedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gen Scheds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gen-sched-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<!--        <?//= Html::a('gen', ['create'], ['class' => 'btn btn-success']) ?>-->
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'projectId',
            '00b30',
            '00a30',
            '01b30',
            '01a30',
            //'02b30',
            //'02a30',
            //'03b30',
            //'03a30',
            //'04b30',
            //'04a30',
            //'05b30',
            //'05a30',
            //'06b30',
            //'06a30',
            //'07b30',
            //'07a30',
            //'08b30',
            //'08a30',
            //'09b30',
            //'09a30',
            //'10b30',
            //'10a30',
            //'11b30',
            //'11a30',
            //'12b30',
            //'12a30',
            //'13b30',
            //'13a30',
            //'14b30',
            //'14a30',
            //'15b30',
            //'15a30',
            //'16b30',
            //'16a30',
            //'17b30',
            //'17a30',
            //'18b30',
            //'18a30',
            //'19b30',
            //'19a30',
            //'20b30',
            //'20a30',
            //'21b30',
            //'21a30',
            //'22b30',
            //'22a30',
            //'23b30',
            //'23a30',
            //'24b30',
            //'24a30',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
