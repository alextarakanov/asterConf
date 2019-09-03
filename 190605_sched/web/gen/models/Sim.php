<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sim".
 *
 * @property int $id
 * @property int $sim_name
 * @property int $bank_name
 * @property int $sim_login
 * @property int $sim_team_id
 * @property int $goipid
 * @property int $line_name
 * @property int $dev_disable
 * @property int $plan_line_name
 * @property int $imei_mode
 * @property string $imei
 * @property int $remain_time
 * @property int $time_unit
 * @property string $period_limit
 * @property int $time_limit
 * @property int $no_ring_limit
 * @property int $no_answer_limit
 * @property int $short_call_limit
 * @property int $no_ring_remain
 * @property int $no_answer_remain
 * @property int $short_call_remain
 * @property int $short_time
 * @property int $period_time_remain
 * @property int $period_count_remain
 * @property int $sleep
 * @property int $no_ring_disable
 * @property int $no_answer_disable
 * @property int $short_call_disable
 * @property int $call_state
 * @property string $imsi
 * @property string $last_imei
 * @property int $count_limit
 * @property int $count_remain
 * @property int $no_connected_limit
 * @property int $no_connected_remain
 * @property string $iccid
 * @property int $logout_time
 * @property int $s_no_connect_call_c
 * @property int $auto_reset_remain
 * @property int $auto_reset_remain_s
 * @property string $last_call_msg
 * @property int $count_limit_no_connect
 * @property string $remark
 * @property int $limit_sms
 * @property int $remain_sms
 * @property int $period_remain_sms
 * @property int $month_remain_time
 * @property int $month_limit_time
 * @property int $month_reset_day
 * @property string $month_last_reset_time
 * @property string $simnum
 */
class Sim extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sim';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sim_name', 'bank_name', 'sim_login', 'sim_team_id', 'goipid', 'line_name', 'dev_disable', 'plan_line_name', 'imei_mode', 'remain_time', 'time_unit', 'time_limit', 'no_ring_limit', 'no_answer_limit', 'short_call_limit', 'no_ring_remain', 'no_answer_remain', 'short_call_remain', 'short_time', 'period_time_remain', 'period_count_remain', 'sleep', 'no_ring_disable', 'no_answer_disable', 'short_call_disable', 'call_state', 'count_limit', 'count_remain', 'no_connected_limit', 'no_connected_remain', 'logout_time', 's_no_connect_call_c', 'auto_reset_remain', 'auto_reset_remain_s', 'count_limit_no_connect', 'limit_sms', 'remain_sms', 'period_remain_sms', 'month_remain_time', 'month_limit_time', 'month_reset_day'], 'integer'],
            [['bank_name', 'imsi', 'logout_time', 's_no_connect_call_c', 'last_call_msg', 'count_limit_no_connect', 'remark', 'simnum'], 'required'],
            [['month_last_reset_time'], 'safe'],
            [['imei', 'last_imei'], 'string', 'max' => 15],
            [['period_limit'], 'string', 'max' => 2000],
            [['imsi', 'iccid', 'remark', 'simnum'], 'string', 'max' => 32],
            [['last_call_msg'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sim_name' => 'Sim Name',
            'bank_name' => 'Bank Name',
            'sim_login' => 'Sim Login',
            'sim_team_id' => 'Sim Team ID',
            'goipid' => 'Goipid',
            'line_name' => 'Line Name',
            'dev_disable' => 'Dev Disable',
            'plan_line_name' => 'Plan Line Name',
            'imei_mode' => 'Imei Mode',
            'imei' => 'Imei',
            'remain_time' => 'Remain Time',
            'time_unit' => 'Time Unit',
            'period_limit' => 'Period Limit',
            'time_limit' => 'Time Limit',
            'no_ring_limit' => 'No Ring Limit',
            'no_answer_limit' => 'No Answer Limit',
            'short_call_limit' => 'Short Call Limit',
            'no_ring_remain' => 'No Ring Remain',
            'no_answer_remain' => 'No Answer Remain',
            'short_call_remain' => 'Short Call Remain',
            'short_time' => 'Short Time',
            'period_time_remain' => 'Period Time Remain',
            'period_count_remain' => 'Period Count Remain',
            'sleep' => 'Sleep',
            'no_ring_disable' => 'No Ring Disable',
            'no_answer_disable' => 'No Answer Disable',
            'short_call_disable' => 'Short Call Disable',
            'call_state' => 'Call State',
            'imsi' => 'Imsi',
            'last_imei' => 'Last Imei',
            'count_limit' => 'Count Limit',
            'count_remain' => 'Count Remain',
            'no_connected_limit' => 'No Connected Limit',
            'no_connected_remain' => 'No Connected Remain',
            'iccid' => 'Iccid',
            'logout_time' => 'Logout Time',
            's_no_connect_call_c' => 'S No Connect Call C',
            'auto_reset_remain' => 'Auto Reset Remain',
            'auto_reset_remain_s' => 'Auto Reset Remain S',
            'last_call_msg' => 'Last Call Msg',
            'count_limit_no_connect' => 'Count Limit No Connect',
            'remark' => 'Remark',
            'limit_sms' => 'Limit Sms',
            'remain_sms' => 'Remain Sms',
            'period_remain_sms' => 'Period Remain Sms',
            'month_remain_time' => 'Month Remain Time',
            'month_limit_time' => 'Month Limit Time',
            'month_reset_day' => 'Month Reset Day',
            'month_last_reset_time' => 'Month Last Reset Time',
            'simnum' => 'Simnum',
        ];
    }
}
