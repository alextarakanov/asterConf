<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gen_project".
 *
 * @property int $projectId
 * @property string $projectName
 * @property string $projectNameDescribe
 * @property int $enableProject
 * @property int $setMinimumConnectSecond
 * @property int $setMaximumConnectSecond
 * @property int $setMinimumMinutePerDay
 * @property int $setMaximumMinutePerDay
 * @property int $setMinutePerMonth
 * @property int $setCountRepeatErrorPerDay
 * @property int $setCountAnsweredCallPerDay
 * @property int $setCountAnsweredCallPerMonth
 * @property int $setTimeSuccessCallSeconds
 * @property string $setSoundDir
 * @property int $restMinuteEveryDay
 * @property int $restMinuteEveryMonth
 * @property int $usedCallLimitNow
 * @property int $setOutgoingSchedulerTrunk
 * @property int $setSchedulerGroupId
 * @property string $createDatetime
 *
 * @property GenANumber[] $genANumbers
 * @property GenBNumber[] $genBNumbers
 * @property GenSched $genSched
 */
class GenProject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gen_project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enableProject', 'setMinimumConnectSecond', 'setMaximumConnectSecond', 'setMinimumMinutePerDay', 'setMaximumMinutePerDay', 'setMinutePerMonth', 'setCountRepeatErrorPerDay', 'setCountAnsweredCallPerDay', 'setCountAnsweredCallPerMonth', 'setTimeSuccessCallSeconds', 'restMinuteEveryDay', 'restMinuteEveryMonth', 'usedCallLimitNow', 'setOutgoingSchedulerTrunk'], 'integer'],
            [['createDatetime'], 'safe'],
            [['projectName', 'projectNameDescribe'], 'string', 'max' => 100],
            [['setSoundDir'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'projectId' => 'Project ID',
            'projectName' => 'Project Name',
            'projectNameDescribe' => 'Project Name Describe',
            'enableProject' => 'Enable Project',
            'setMinimumConnectSecond' => 'Set Minimum Connect Second',
            'setMaximumConnectSecond' => 'Set Maximum Connect Second',
            'setMinimumMinutePerDay' => 'Set Minimum Minute Per Day',
            'setMaximumMinutePerDay' => 'Set Maximum Minute Per Day',
            'setMinutePerMonth' => 'Set Minute Per Month',
            'setCountRepeatErrorPerDay' => 'Set Count Repeat Error Per Day',
            'setCountAnsweredCallPerDay' => 'Set Count Answered Call Per Day',
            'setCountAnsweredCallPerMonth' => 'Set Count Answered Call Per Month',
            'setTimeSuccessCallSeconds' => 'Set Time Success Call Seconds',
            'setSoundDir' => 'Set Sound Dir',
            'restMinuteEveryDay' => 'Rest Minute Every Day',
            'restMinuteEveryMonth' => 'Rest Minute Every Month',
            'usedCallLimitNow' => 'Used Call Limit Now',
            'setOutgoingSchedulerTrunk' => 'Set Outgoing Scheduler Trunk',
//            'setSchedulerGroupId' => 'Set Scheduler Group ID',
            'createDatetime' => 'Create Datetime',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenANumbers()
    {
        return $this->hasMany(GenANumber::className(), ['projectId' => 'projectId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenBNumbers()
    {
        return $this->hasMany(GenBNumber::className(), ['projectId' => 'projectId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenSched()
    {
        return $this->hasOne(GenSched::className(), ['projectId' => 'projectId']);
    }

//    public  function fieldTableCurrentHour ()
//    {
//        date_default_timezone_set('Europe/Moscow');
//
//        if ( date('i') < 30 ){
//            $timeTable="b30";
//        } else {
//            $timeTable="a30";
//        }
//        return date('H').$timeTable;
//
//    }
}
