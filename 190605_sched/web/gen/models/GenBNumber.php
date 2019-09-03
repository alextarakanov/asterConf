<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gen_bNumber".
 *
 * @property int $bNumber we will call to this number
 * @property int $aNumber we will call from this number
 * @property int $sim_name
 * @property string $stateALeg
 * @property string $stateBLeg
 * @property string $uniqueidA
 * @property string $uniqueidB
 * @property string $filename
 * @property int $projectId
 * @property int $bNumberEnable
 * @property int $setMinutePerDay
 * @property int $usedSecondPerDay
 * @property int $usedMinutePerDay
 * @property int $usedSecondPerMonth
 * @property int $usedMinutePerMonth
 * @property int $usedTotalSecond
 * @property int $usedTotalMinute
 * @property int $usedCountRepeatErrorPerDay
 * @property int $usedCountRepeatErrorTotal
 * @property int $usedCountAnsweredCallPerDay
 * @property int $usedCountAnsweredCallPerMonth
 * @property int $usedCountAnsweredCallTotal
 * @property string $lastTryDatetime
 * @property string $lastSuccessDatetime
 * @property string $createDatetime
 * @property string $describe
 * @property string $channel
 * @property string $exten
 * @property string $usedErrorLoginSimChannel
 * @property string $acd
 * @property string $delete
 *
 * @property int $smb_sim_login
 * @property int $smb_sim_name
 * @property int $smb_line_name
 * @property int $smb_sim_team_id
 * @property int $smb_dev_disable
 * @property int $smb_sim_team_name
 * @property int $smb_device_line_name
 * @property int $smb_device_line_status
 * @property int $smb_device_gsm_status
 * @property int $smb_device_oper
 * @property int $project_name
 *
 * @property GenProject $project
 */
class GenBNumber extends \yii\db\ActiveRecord
{
    public $smb_sim_login;
    public $smb_sim_name;
    public $smb_line_name;
    public $smb_sim_team_id;
    public $smb_dev_disable;
    public $smb_sim_team_name;
    public $smb_device_line_name;
    public $smb_device_line_status;
    public $smb_device_gsm_status;
    public $smb_device_oper;
    public $project_name;
//    public $group_edit;

    public $restUsedMinutePerDay;
    public $restUsedMinutePerMonth;
    public $restUsedTotalMinute;
    public $restUsedCountRepeatErrorPerDay;
    public $restUsedCountRepeatErrorTotal;
    public $restUsedCountAnsweredCallPerDay;
    public $restUsedCountAnsweredCallPerMonth;
    public $restUsedCountAnsweredCallTotal;


    public $restSetMinutePerDay;
    public $setMinutePerDayStart;
    public $setMinutePerDayStop;

    public $restProjectId;
    public $acd;
    public $delete;



    public $numberFromViewToController;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gen_bNumber';
    }



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bNumber'], 'required'],
            [['usedErrorLoginSimChannel','bNumber', 'aNumber', 'sim_name', 'projectId', 'bNumberEnable', 'setMinutePerDay', 'usedSecondPerDay', 'usedMinutePerDay', 'usedSecondPerMonth', 'usedMinutePerMonth', 'usedTotalSecond', 'usedTotalMinute', 'usedCountRepeatErrorPerDay', 'usedCountRepeatErrorTotal', 'usedCountAnsweredCallPerDay', 'usedCountAnsweredCallPerMonth', 'usedCountAnsweredCallTotal'], 'integer'],
            [['channel','exten','restUsedCountRepeatErrorPerDay', 'lastTryDatetime', 'lastSuccessDatetime', 'createDatetime'], 'safe'],
            [['acd','stateALeg', 'stateBLeg', 'uniqueidA', 'uniqueidB'], 'string', 'max' => 50],
            [['filename'], 'string', 'max' => 150],
            [['describe'], 'string', 'max' => 100],
            [['bNumber'], 'unique'],
            [['projectId'], 'exist', 'skipOnError' => true, 'targetClass' => GenProject::className(), 'targetAttribute' => ['projectId' => 'projectId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bNumber' => 'B Number',
            'aNumber' => 'A Number',
            'sim_name' => 'Sim Name',
            'stateALeg' => 'State A Leg',
            'stateBLeg' => 'State B Leg',
            'uniqueidA' => 'Uniqueid A',
            'uniqueidB' => 'Uniqueid B',
            'filename' => 'Filename',
            'projectId' => 'Project ID',
            'bNumberEnable' => 'B Number Enable',
            'setMinutePerDay' => 'Set Minute Per Day',
            'usedSecondPerDay' => 'Used Second Per Day',
            'usedMinutePerDay' => 'Used Minute Per Day',
            'usedSecondPerMonth' => 'Used Second Per Month',
            'usedMinutePerMonth' => 'Used Minute Per Month',
            'usedTotalSecond' => 'Used Total Second',
            'usedTotalMinute' => 'Used Total Minute',
            'usedCountRepeatErrorPerDay' => 'Used Count Repeat Error Per Day',
            'usedCountRepeatErrorTotal' => 'Used Count Repeat Error Total',
            'usedCountAnsweredCallPerDay' => 'Used Count Answered Call Per Day',
            'usedCountAnsweredCallPerMonth' => 'Used Count Answered Call Per Month',
            'usedCountAnsweredCallTotal' => 'Used Count Answered Call Total',
            'lastTryDatetime' => 'Last Try Datetime',
            'lastSuccessDatetime' => 'Last Success Datetime',
            'createDatetime' => 'Create Datetime',
            'describe' => 'Describe',
            'smb_sim_login' => 'Table SIM login',
            'smb_sim_name' => 'Table SIM name',
            'smb_line_name' => 'goip',
            'smb_sim_team_id' => 'Table TEAM group name',
            'smb_dev_disable' => 'SMB slot',
            'smb_sim_team_name' => 'SMB Group',
            'smb_device_line_name' => 'Device line name',
            'smb_device_line_status' => 'GOIP line status',
            'smb_device_gsm_status' => 'GOIP gsm status',
            'smb_device_oper' => 'GOIP operator',
            'project_name' => 'GEN Project',
            'channel' =>  'channel',
            'exten' => 'exten',
            'acd' => 'acd',
            'usedErrorLoginSimChannel' => 'Error Login Sim to Channel',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(GenProject::className(), ['projectId' => 'projectId']);
    }

    public function getSmbSim()
    {
        return $this->hasOne(Sim::className(), ['sim_name' => 'sim_name']);
    }

    public function getSmbSimTeam()
    {
        return $this->hasOne(SimTeam::className(), ['sim_team_id' => 'sim_team_id'])
            ->viaTable('sim', ['sim_name' => 'sim_name']);
    }

    public function getSmbDeviceLine()
    {
        return $this->hasOne(DeviceLine::className(), ['line_name' => 'line_name'])
            ->viaTable('sim', ['sim_name' => 'sim_name']);
    }

    public  function getACD()
    {
        if ( $this->usedCountAnsweredCallPerDay != 0) {
            $min = floor($this->usedSecondPerDay/$this->usedCountAnsweredCallPerDay/60);
            $sec = floor($this->usedSecondPerDay/$this->usedCountAnsweredCallPerDay)-floor($this->usedSecondPerDay/$this->usedCountAnsweredCallPerDay/60)*60;
          return $min.'.'.$sec;
        }
            return 0;
    }
}
