<?php
/**
 * @copyright Copyright (c) 2013-2016 Voodoo Mobile Consulting Group LLC
 * @link      https://voodoo.rocks
 * @license   http://opensource.org/licenses/MIT The MIT License (MIT)
 */
//namespace vm\cron;
namespace app\modules;

use Yii;
use yii\base\Exception;


/**
 * Class CronModule
 * @package vm\api
 */
class CronModule extends \yii\base\Module
{
    public $controllerNamespace = 'vm\cron\controllers';
    /**
     * @throws Exception
     */
    public function init()
    {
        parent::init();
    }
}