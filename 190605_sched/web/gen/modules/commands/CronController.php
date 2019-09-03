<?php
/**
 * @author mult1mate
 * Date: 06.02.16
 * Time: 16:52
 */

namespace app\commands;

use app\models\Task;
use vm\cron\TaskRunner;
use yii\console\Controller;

class CronController extends Controller
{
    public function actionCheckTasks()
    {
        TaskRunner::checkAndRunTasks(Task::getAll());
    }
}
