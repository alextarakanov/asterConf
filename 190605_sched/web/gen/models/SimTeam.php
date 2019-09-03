<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sim_team".
 *
 * @property int $sim_team_id
 * @property string $sim_team_name
 * @property int $work_time
 * @property int $sleep_time
 * @property int $imei_random
 * @property int $imei_type
 * @property int $scheduler_id
 * @property string $status
 * @property string $next_time
 */
class SimTeam extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sim_team';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['work_time', 'sleep_time', 'imei_random', 'imei_type', 'scheduler_id'], 'integer'],
            [['scheduler_id', 'status', 'next_time'], 'required'],
            [['sim_team_name', 'next_time'], 'string', 'max' => 64],
            [['status'], 'string', 'max' => 16],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sim_team_id' => 'Sim Team ID',
            'sim_team_name' => 'Sim Team Name',
            'work_time' => 'Work Time',
            'sleep_time' => 'Sleep Time',
            'imei_random' => 'Imei Random',
            'imei_type' => 'Imei Type',
            'scheduler_id' => 'Scheduler ID',
            'status' => 'Status',
            'next_time' => 'Next Time',
        ];
    }
}
