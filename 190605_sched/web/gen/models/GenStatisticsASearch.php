<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GenStatisticsA;

/**
 * GenStatisticsASearch represents the model behind the search form of `app\models\GenStatisticsA`.
 */
class GenStatisticsASearch extends GenStatisticsA
{
    function __construct()
    {
        date_default_timezone_set('Europe/Moscow');

        $this->yearStart = date('Y');
        $this->monthStart = date("m");
        $this->dayStart = date("1");
        $this->yearEnd = date('Y');
        $this->monthEnd = date('m');
        $this->dayEnd = date('d');

    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idStatistics', 'projectId', 'aNumber', 'sim_name', 'usedSecondPerDay', 'usedMinutePerDay', 'usedCountAnsweredCallPerDay', 'usedCountRepeatErrorPerDay'], 'integer'],
            [['yearStart', 'monthStart', 'dayStart', 'yearEnd', 'monthEnd', 'dayEnd', 'createDatetime'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = GenStatisticsA::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idStatistics' => $this->idStatistics,
            'projectId' => $this->projectId,
            'aNumber' => $this->aNumber,
            'sim_name' => $this->sim_name,
            'usedSecondPerDay' => $this->usedSecondPerDay,
            'usedMinutePerDay' => $this->usedMinutePerDay,
            'usedCountAnsweredCallPerDay' => $this->usedCountAnsweredCallPerDay,
            'usedCountRepeatErrorPerDay' => $this->usedCountRepeatErrorPerDay,
            'createDatetime' => $this->createDatetime,
        ]);

        return $dataProvider;
    }



    public function mySearch($params)
    {
//        var_dump($params);die;

        $query = GenStatisticsA::find()
            ->select(['projectId', 'aNumber', 'sim_name', 'sum(usedMinutePerDay) as usedMinutePerDay', 'floor(sum(usedSecondPerDay)/60) as usedSecondPerDay', 'sum(usedCountAnsweredCallPerDay) as usedCountAnsweredCallPerDay', 'sum(usedCountRepeatErrorPerDay) as usedCountRepeatErrorPerDay'])
            ->where(['between', 'createDatetime', "$this->yearStart-$this->monthStart-$this->dayStart 00:15:00", "$this->yearEnd-$this->monthEnd-$this->dayEnd  00:15:00"])
//            ->where(['between', 'createDatetime',  $params->dateStart. " 00:15:00", $params->dateEnd. "  00:15:00"])
//            ->andWhere(['bNumber' => '79110100459'])
            ->groupBy(['aNumber']);
//            ->asArray()
//            ->all();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->andFilterWhere([
            'aNumber' => $this->aNumber,
            'projectId' => $this->projectId,
            'sim_name' => $this->sim_name,
            'usedSecondPerDay' => $this->usedSecondPerDay,
            'usedMinutePerDay' => $this->usedMinutePerDay,
            'usedCountAnsweredCallPerDay' => $this->usedCountAnsweredCallPerDay,
            'usedCountRepeatErrorPerDay' => $this->usedCountRepeatErrorPerDay,
//            'createDatetime' => $this->createDatetime,
        ]);

//        $query->andFilterWhere(['like', GenProject::tableName() . '.projectName', $this->project_name]);

//        $query = \Yii::$app->db->createCommand('
//            SELECT  bNumber,
//                    sim_name,
//                    sum(usedMinutePerDay),
//                    floor(sum(usedSecondPerDay)/60),
//                    sum(usedCountAnsweredCallPerDay),
//                    sum(usedCountRepeatErrorPerDay)
//             FROM gen_statisticsB
//             WHERE
//             (createDatetime BETWEEN ":yearStart-:monthStart-:dayStart" AND ":yearEnd-:monthEnd-:dayEnd")
//             GROUP BY bNumber')
//            ->bindValues($params)
//            ->queryAll();


        return $dataProvider;
    }
    ////
    ///
    ///
    ///
    public function mySearchNumber($params)
    {
//        var_dump($this->dayStart);die;

        $query = GenStatisticsA::find()
            ->select(['projectId', 'aNumber', 'sim_name', 'usedMinutePerDay', 'floor(usedSecondPerDay/60) as usedSecondPerDay', 'usedCountAnsweredCallPerDay', 'usedCountRepeatErrorPerDay', 'createDatetime'])
            ->where(['between', 'createDatetime', "$this->yearStart-$this->monthStart-$this->dayStart 00:15:00", "$this->yearEnd-$this->monthEnd-$this->dayEnd  00:15:00"])
            ->andWhere(['aNumber' => $this->aNumberCheck]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'aNumber' => $this->aNumber,
            'projectId' => $this->projectId,
            'sim_name' => $this->sim_name,
            'usedSecondPerDay' => $this->usedSecondPerDay,
            'usedMinutePerDay' => $this->usedMinutePerDay,
            'usedCountAnsweredCallPerDay' => $this->usedCountAnsweredCallPerDay,
            'usedCountRepeatErrorPerDay' => $this->usedCountRepeatErrorPerDay,
            'createDatetime' => $this->createDatetime,
        ]);

        return $dataProvider;
    }

    public function mySearchNumbers($params)
    {

        $query = GenStatisticsA::find()
            ->select(['sum(usedMinutePerDay) as usedMinutePerDay', 'floor(sum(usedSecondPerDay)/60) as usedSecondPerDay', 'sum(usedCountAnsweredCallPerDay) as usedCountAnsweredCallPerDay', 'sum(usedCountRepeatErrorPerDay) as usedCountRepeatErrorPerDay', 'DATE_FORMAT(createDatetime, "%Y-%m-%d") as createDatetime'])
            ->where(['between', 'createDatetime', "$this->yearStart-$this->monthStart-$this->dayStart 00:15:00", "$this->yearEnd-$this->monthEnd-$this->dayEnd  00:15:00"])
        ;
        if ($this->projectId >1 )
        {
            $query->andWhere(['=','projectId',$this->projectId]);
//            var_dump($this->projectId);die;

        }
        $query->groupBy(['DATE_FORMAT(createDatetime, "%Y-%m-%d")']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'usedSecondPerDay' => $this->usedSecondPerDay,
            'usedMinutePerDay' => $this->usedMinutePerDay,
            'usedCountAnsweredCallPerDay' => $this->usedCountAnsweredCallPerDay,
            'usedCountRepeatErrorPerDay' => $this->usedCountRepeatErrorPerDay,
            'createDatetime' => $this->createDatetime,
        ]);

        return $dataProvider;
    }

}
