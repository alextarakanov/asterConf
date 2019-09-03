<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GenANumber;

/**
 * GenANumberSearch represents the model behind the search form of `app\models\GenANumber`.
 */
class GenANumberSearch extends GenANumber
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aNumber', 'bNumber', 'sim_name', 'projectId', 'aNumberEnable', 'setMinutePerDay', 'usedSecondPerDay', 'usedMinutePerDay', 'usedSecondPerMonth', 'usedMinutePerMonth', 'usedTotalSecond', 'usedTotalMinute', 'usedCountRepeatErrorPerDay', 'usedCountRepeatErrorTotal', 'usedCountAnsweredCallPerDay', 'usedCountAnsweredCallPerMonth', 'usedCountAnsweredCallTotal'], 'integer'],
            [['channel','exten','project_name', 'smb_device_oper', 'smb_device_gsm_status', 'smb_device_line_status', 'smb_device_line_name', 'smb_sim_team_name', 'smb_dev_disable', 'smb_line_name', 'smb_sim_team_name', 'smb_sim_login', 'smb_sim_name','stateALeg', 'stateBLeg', 'uniqueidA', 'uniqueidB', 'filename', 'lastTryDatetime', 'lastSuccessDatetime', 'createDatetime', 'describe'], 'safe'],
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
//        $query = GenANumber::find();
        $query = GenANumber::find()->joinWith('project')->joinWith('smbSimTeam')->joinWith('smbDeviceLine');


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['smb_sim_login'] = [
            'asc' => [Sim::tableName() . '.sim_login' => SORT_ASC],
            'desc' => [Sim::tableName() . '.sim_login' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['smb_sim_name'] = [
            'asc' => [Sim::tableName() . '.sim_name' => SORT_ASC],
            'desc' => [Sim::tableName() . '.sim_name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['smb_line_name'] = [
            'asc' => [Sim::tableName() . '.line_name' => SORT_ASC],
            'desc' => [Sim::tableName() . '.line_name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['smb_dev_disable'] = [
            'asc' => [Sim::tableName() . '.dev_disable' => SORT_ASC],
            'desc' => [Sim::tableName() . '.dev_disable' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['smb_sim_team_name'] = [
            'asc' => [SimTeam::tableName() . '.sim_team_name' => SORT_ASC],
            'desc' => [SimTeam::tableName() . '.sim_team_name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['smb_device_line_name'] = [
            'asc' => [DeviceLine::tableName() . '.line_name' => SORT_ASC],
            'desc' => [DeviceLine::tableName() . '.line_name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['smb_device_gsm_status'] = [
            'asc' => [DeviceLine::tableName() . '.gsm_status' => SORT_ASC],
            'desc' => [DeviceLine::tableName() . '.gsm_status' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['smb_device_line_status'] = [
            'asc' => [DeviceLine::tableName() . '.line_status' => SORT_ASC],
            'desc' => [DeviceLine::tableName() . '.line_status' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['smb_device_oper'] = [
            'asc' => [DeviceLine::tableName() . '.oper' => SORT_ASC],
            'desc' => [DeviceLine::tableName() . '.oper' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['project_name'] = [
            'asc' => [GenProject::tableName() . '.projectName' => SORT_ASC],
            'desc' => [GenProject::tableName() . '.projectName' => SORT_DESC],
        ];


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'projectId' => $this->projectId,
            'aNumberEnable' => $this->aNumberEnable,
            'setMinutePerDay' => $this->setMinutePerDay,
            'usedSecondPerDay' => $this->usedSecondPerDay,
            'usedMinutePerDay' => $this->usedMinutePerDay,
            'usedSecondPerMonth' => $this->usedSecondPerMonth,
            'usedMinutePerMonth' => $this->usedMinutePerMonth,
            'usedTotalSecond' => $this->usedTotalSecond,
            'usedTotalMinute' => $this->usedTotalMinute,
            'usedCountRepeatErrorPerDay' => $this->usedCountRepeatErrorPerDay,
            'usedCountRepeatErrorTotal' => $this->usedCountRepeatErrorTotal,
            'usedCountAnsweredCallPerDay' => $this->usedCountAnsweredCallPerDay,
            'usedCountAnsweredCallPerMonth' => $this->usedCountAnsweredCallPerMonth,
            'usedCountAnsweredCallTotal' => $this->usedCountAnsweredCallTotal,
            'lastTryDatetime' => $this->lastTryDatetime,
            'lastSuccessDatetime' => $this->lastSuccessDatetime,
            'createDatetime' => $this->createDatetime,
            'channel' => $this->channel,
            'exten' => $this->exten,
            Sim::tableName() . '.sim_login' => $this->smb_sim_login,
            Sim::tableName() . '.dev_disable' => $this->smb_dev_disable,
            SimTeam::tableName() . '.sim_team_name' => $this->smb_sim_team_name,
            DeviceLine::tableName() . '.gsm_status' => $this->smb_device_gsm_status,
            DeviceLine::tableName() . '.line_status' => $this->smb_device_line_status,
        ]);

        $query->andFilterWhere(['like', 'stateALeg', $this->stateALeg])
            ->andFilterWhere(['like', 'stateBLeg', $this->stateBLeg])
            ->andFilterWhere(['like', 'bNumber', $this->bNumber])
            ->andFilterWhere(['like', 'aNumber', $this->aNumber])
            ->andFilterWhere(['like', 'gen_aNumber.sim_name', $this->sim_name])
            ->andFilterWhere(['like', Sim::tableName() . '.sim_name', $this->smb_sim_name])
            ->andFilterWhere(['like', Sim::tableName() . '.line_name', $this->smb_line_name])
            ->andFilterWhere(['like', 'uniqueidA', $this->uniqueidA])
            ->andFilterWhere(['like', 'uniqueidB', $this->uniqueidB])
            ->andFilterWhere(['like', 'filename', $this->filename])
            ->andFilterWhere(['like', 'describe', $this->describe])
            ->andFilterWhere(['like', DeviceLine::tableName() . '.line_name', $this->smb_device_line_name])
            ->andFilterWhere(['like', DeviceLine::tableName() . '.oper', $this->smb_device_oper])
            ->andFilterWhere(['like', GenProject::tableName() . '.projectName', $this->project_name]);

        return $dataProvider;
    }
}
