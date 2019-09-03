<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "device_line".
 *
 * @property int $id
 * @property int $line_name
 * @property int $goip_name
 * @property int $goip_team_id
 * @property int $line_status
 * @property int $gsm_status
 * @property string $imei
 * @property int $dev_disable
 * @property string $sms_client_id
 * @property int $csq
 * @property string $oper
 * @property string $call_state
 * @property int $sleep
 * @property int $last_call_record_id
 * @property int $auto_simulation_id
 * @property int $next_auto_dial_time
 * @property string $last_auto_dial_time
 */
class DeviceLine extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'device_line';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['line_name', 'goip_name', 'goip_team_id', 'line_status', 'gsm_status', 'sms_client_id', 'oper', 'call_state', 'last_call_record_id', 'auto_simulation_id', 'next_auto_dial_time', 'last_auto_dial_time'], 'required'],
            [['line_name', 'goip_name', 'goip_team_id', 'line_status', 'gsm_status', 'dev_disable', 'csq', 'sleep', 'last_call_record_id', 'auto_simulation_id', 'next_auto_dial_time'], 'integer'],
            [['last_auto_dial_time'], 'safe'],
            [['imei'], 'string', 'max' => 15],
            [['sms_client_id'], 'string', 'max' => 64],
            [['oper', 'call_state'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'line_name' => 'Line Name',
            'goip_name' => 'Goip Name',
            'goip_team_id' => 'Goip Team ID',
            'line_status' => 'Line Status',
            'gsm_status' => 'Gsm Status',
            'imei' => 'Imei',
            'dev_disable' => 'Dev Disable',
            'sms_client_id' => 'Sms Client ID',
            'csq' => 'Csq',
            'oper' => 'Oper',
            'call_state' => 'Call State',
            'sleep' => 'Sleep',
            'last_call_record_id' => 'Last Call Record ID',
            'auto_simulation_id' => 'Auto Simulation ID',
            'next_auto_dial_time' => 'Next Auto Dial Time',
            'last_auto_dial_time' => 'Last Auto Dial Time',
        ];
    }
}
