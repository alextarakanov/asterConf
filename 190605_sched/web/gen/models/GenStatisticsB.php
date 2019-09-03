<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gen_statisticsB".
 *
 * @property int $idStatistics
 * @property int $projectId
 * @property int $bNumber
 * @property int $sim_name
 * @property int $usedSecondPerDay
 * @property int $usedMinutePerDay
 * @property int $usedCountAnsweredCallPerDay
 * @property int $usedCountRepeatErrorPerDay
 * @property string $createDatetime
 * @property string $project_name
 * @property string $bNumberCheck
 * @property int $yearStart
 * @property int $monthStart
 * @property int $dayStart
 * @property int $yearEnd
 * @property int $monthEnd
 * @property int $dayEnd
 */
class GenStatisticsB extends \yii\db\ActiveRecord
{
    public $betweenDate;
    public $yearStart;
    public $monthStart;
    public $dayStart;
    public $yearEnd;
    public $monthEnd;
    public $dayEnd;
    public $project_name;
    public $bNumberCheck;




    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gen_statisticsB';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['projectId', 'bNumber', 'sim_name', 'usedSecondPerDay', 'usedMinutePerDay', 'usedCountAnsweredCallPerDay', 'usedCountRepeatErrorPerDay'], 'integer'],
            [['project_name','yearStart','monthStart','dayStart','yearEnd','monthEnd','dayEnd','createDatetime'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idStatistics' => 'Id Statistics',
            'projectId' => 'Project ID',
            'bNumber' => 'B Number',
            'sim_name' => 'Sim Name',
            'usedSecondPerDay' => 'Used Second Per Day',
            'usedMinutePerDay' => 'Used Minute Per Day',
            'usedCountAnsweredCallPerDay' => 'Used Count Answered Call Per Day',
            'usedCountRepeatErrorPerDay' => 'Used Count Repeat Error Per Day',
            'createDatetime' => 'Create Datetime',
            'yearStart' => 'yearStart',
            'monthStart' => 'monthStart',
            'dayStart' => 'dayStart',
            'yearEnd' => 'yearEnd',
            'monthEnd' => 'monthEnd',
            'dayEnd' => 'dayEnd',
        ];
    }
    public function getProject()
    {
        return $this->hasOne(GenProject::className(), ['projectId' => 'projectId']);
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
