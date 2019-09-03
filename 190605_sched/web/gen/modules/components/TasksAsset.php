<?php
/**
 * @author mult1mate
 * Date: 06.02.16
 * Time: 16:40
 */

namespace vm\cron\assets;

use yii\web\AssetBundle;

class TasksAsset extends AssetBundle
{
    public $sourcePath = '@vendor/voodoo-mobile/yii2-cron/src/assets';

    public $js = [
        'manager_actions.js',
    ];
}