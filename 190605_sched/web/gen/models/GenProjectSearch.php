<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GenProject;

/**
 * GenProjectSearch represents the model behind the search form of `app\models\GenProject`.
 */
class GenProjectSearch extends GenProject
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['projectId', 'enableProject', 'setMinimumConnectSecond', 'setMaximumConnectSecond', 'setMinimumMinutePerDay', 'setMaximumMinutePerDay', 'setMinutePerMonth', 'setCountRepeatErrorPerDay', 'setCountAnsweredCallPerDay', 'setCountAnsweredCallPerMonth', 'setTimeSuccessCallSeconds', 'restMinuteEveryDay', 'restMinuteEveryMonth', 'usedCallLimitNow', 'setOutgoingSchedulerTrunk'], 'integer'],
            [['projectName', 'projectNameDescribe', 'setSoundDir', 'createDatetime'], 'safe'],
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
        $query = GenProject::find();

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
            'projectId' => $this->projectId,
            'enableProject' => $this->enableProject,
            'setMinimumConnectSecond' => $this->setMinimumConnectSecond,
            'setMaximumConnectSecond' => $this->setMaximumConnectSecond,
            'setMinimumMinutePerDay' => $this->setMinimumMinutePerDay,
            'setMaximumMinutePerDay' => $this->setMaximumMinutePerDay,
            'setMinutePerMonth' => $this->setMinutePerMonth,
            'setCountRepeatErrorPerDay' => $this->setCountRepeatErrorPerDay,
            'setCountAnsweredCallPerDay' => $this->setCountAnsweredCallPerDay,
            'setCountAnsweredCallPerMonth' => $this->setCountAnsweredCallPerMonth,
            'setTimeSuccessCallSeconds' => $this->setTimeSuccessCallSeconds,
            'restMinuteEveryDay' => $this->restMinuteEveryDay,
            'restMinuteEveryMonth' => $this->restMinuteEveryMonth,
            'usedCallLimitNow' => $this->usedCallLimitNow,
            'setOutgoingSchedulerTrunk' => $this->setOutgoingSchedulerTrunk,
            'createDatetime' => $this->createDatetime,
        ]);

        $query->andFilterWhere(['like', 'projectName', $this->projectName])
            ->andFilterWhere(['like', 'projectNameDescribe', $this->projectNameDescribe])
            ->andFilterWhere(['like', 'setSoundDir', $this->setSoundDir]);

        return $dataProvider;
    }
}
