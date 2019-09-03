<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gen_sched".
 *
 * @property int $projectId
 * @property int $00b30
 * @property int $00a30
 * @property int $01b30
 * @property int $01a30
 * @property int $02b30
 * @property int $02a30
 * @property int $03b30
 * @property int $03a30
 * @property int $04b30
 * @property int $04a30
 * @property int $05b30
 * @property int $05a30
 * @property int $06b30
 * @property int $06a30
 * @property int $07b30
 * @property int $07a30
 * @property int $08b30
 * @property int $08a30
 * @property int $09b30
 * @property int $09a30
 * @property int $10b30
 * @property int $10a30
 * @property int $11b30
 * @property int $11a30
 * @property int $12b30
 * @property int $12a30
 * @property int $13b30
 * @property int $13a30
 * @property int $14b30
 * @property int $14a30
 * @property int $15b30
 * @property int $15a30
 * @property int $16b30
 * @property int $16a30
 * @property int $17b30
 * @property int $17a30
 * @property int $18b30
 * @property int $18a30
 * @property int $19b30
 * @property int $19a30
 * @property int $20b30
 * @property int $20a30
 * @property int $21b30
 * @property int $21a30
 * @property int $22b30
 * @property int $22a30
 * @property int $23b30
 * @property int $23a30
 * @property int $24b30
 * @property int $24a30
 *
 * @property GenProject $project
 */
class GenSched extends \yii\db\ActiveRecord
{
    public $project_name;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gen_sched';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['projectId'], 'required'],
            [['projectId', '00b30', '00a30', '01b30', '01a30', '02b30', '02a30', '03b30', '03a30', '04b30', '04a30', '05b30', '05a30', '06b30', '06a30', '07b30', '07a30', '08b30', '08a30', '09b30', '09a30', '10b30', '10a30', '11b30', '11a30', '12b30', '12a30', '13b30', '13a30', '14b30', '14a30', '15b30', '15a30', '16b30', '16a30', '17b30', '17a30', '18b30', '18a30', '19b30', '19a30', '20b30', '20a30', '21b30', '21a30', '22b30', '22a30', '23b30', '23a30'], 'integer'],
            [['projectId'], 'unique'],
            [['projectId'], 'exist', 'skipOnError' => true, 'targetClass' => GenProject::className(), 'targetAttribute' => ['projectId' => 'projectId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'projectId' => 'Project ID',
            '00b30' => '00:00 - 00:30',
            '00a30' => '00:30 - 01:00',
            '01b30' => '01:00 - 01:30',
            '01a30' => '01:30 - 02:00',
            '02b30' => '02:00 - 02:30',
            '02a30' => '02:30 - 03:00',
            '03b30' => '03:00 - 03:30',
            '03a30' => '03:30 - 04:00',
            '04b30' => '04:00 - 04:30',
            '04a30' => '04:30 - 05:00',
            '05b30' => '05:00 - 05:30',
            '05a30' => '05:30 - 06:00',
            '06b30' => '06:00 - 06:30',
            '06a30' => '06:30 - 07:00',
            '07b30' => '07:00 - 07:30',
            '07a30' => '07:30 - 08:00',
            '08b30' => '08:00 - 08:30',
            '08a30' => '08:30 - 09:00',
            '09b30' => '09:00 - 09:30',
            '09a30' => '09:30 - 10:00',
            '10b30' => '10:00 - 10:30',
            '10a30' => '10:30 - 11:00',
            '11b30' => '11:00 - 11:30',
            '11a30' => '11:30 - 12:00',
            '12b30' => '12:00 - 12:30',
            '12a30' => '12:30 - 13:00',
            '13b30' => '13:00 - 13:30',
            '13a30' => '13:30 - 14:00',
            '14b30' => '14:00 - 14:30',
            '14a30' => '14:30 - 15:00',
            '15b30' => '15:00 - 15:30',
            '15a30' => '15:30 - 16:00',
            '16b30' => '16:00 - 16:30',
            '16a30' => '16:30 - 17:00',
            '17b30' => '17:00 - 17:30',
            '17a30' => '17:30 - 18:00',
            '18b30' => '18:00 - 18:30',
            '18a30' => '18:30 - 19:00',
            '19b30' => '19:00 - 19:30',
            '19a30' => '19:30 - 20:00',
            '20b30' => '20:00 - 20:30',
            '20a30' => '20:30 - 21:00',
            '21b30' => '21:00 - 21:30',
            '21a30' => '21:30 - 22:00',
            '22b30' => '22:00 - 22:30',
            '22a30' => '22:30 - 23:30',
            '23b30' => '23:00 - 23:00',
            '23a30' => '23:30 - 24:00',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(GenProject::className(), ['projectId' => 'projectId']);
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
