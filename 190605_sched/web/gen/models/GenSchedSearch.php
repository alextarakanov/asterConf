<?php

namespace app\models;

use app\models\GenSched;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * GenSchedSearch represents the model behind the search form of `app\models\GenSched`.
 */
class GenSchedSearch extends GenSched
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['projectId', '00b30', '00a30', '01b30', '01a30', '02b30', '02a30', '03b30', '03a30', '04b30', '04a30', '05b30', '05a30', '06b30', '06a30', '07b30', '07a30', '08b30', '08a30', '09b30', '09a30', '10b30', '10a30', '11b30', '11a30', '12b30', '12a30', '13b30', '13a30', '14b30', '14a30', '15b30', '15a30', '16b30', '16a30', '17b30', '17a30', '18b30', '18a30', '19b30', '19a30', '20b30', '20a30', '21b30', '21a30', '22b30', '22a30', '23b30', '23a30'], 'integer'],
            [['project_name'], 'safe'],
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
//        $query = GenSched::find();
        $query = GenSched::find()->joinWith('project');

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
        $dataProvider->sort->attributes['project_name'] = [
            'asc' => [GenProject::tableName() . '.projectName' => SORT_ASC],
            'desc' => [GenProject::tableName() . '.projectName' => SORT_DESC],
        ];

        // grid filtering conditions
        $query->andFilterWhere([
            'projectId' => $this->projectId,
//            '00b30' => $this->00b30,
//            '00a30' => $this->00a30,
//            '01b30' => $this->01b30,
//            '01a30' => $this->01a30,
//            '02b30' => $this->02b30
//            '02a30' => $this->02a30,
//            '03b30' => $this->03b30,
//            '03a30' => $this->03a30,
//            '04b30' => $this->04b30,
//            '04a30' => $this->04a30,
//            '05b30' => $this->05b30,
//            '05a30' => $this->05a30,
//            '06b30' => $this->06b30,
//            '06a30' => $this->06a30,
//            '07b30' => $this->07b30,
//            '07a30' => $this->07a30,
//            '08b30' => $this->08b30,
//            '08a30' => $this->08a30,
//            '09b30' => $this->09b30,
//            '09a30' => $this->09a30,
//            '10b30' => $this->10b30,
//            '10a30' => $this->10a30,
//            '11b30' => $this->11b30,
//            '11a30' => $this->11a30,
//            '12b30' => $this->12b30,
//            '12a30' => $this->12a30,
//            '13b30' => $this->13b30,
//            '13a30' => $this->13a30,
//            '14b30' => $this->14b30,
//            '14a30' => $this->14a30,
//            '15b30' => $this->15b30,
//            '15a30' => $this->15a30,
//            '16b30' => $this->16b30,
//            '16a30' => $this->16a30,
//            '17b30' => $this->17b30,
//            '17a30' => $this->17a30,
//            '18b30' => $this->18b30,
//            '18a30' => $this->18a30,
//            '19b30' => $this->19b30,
//            '19a30' => $this->19a30,
//            '20b30' => $this->20b30,
//            '20a30' => $this->20a30,
//            '21b30' => $this->21b30,
//            '21a30' => $this->21a30,
//            '22b30' => $this->22b30,
//            '22a30' => $this->22a30,
//            '23b30' => $this->23b30,
//            '23a30' => $this->23a30,
        ]);
        $query->andFilterWhere(['like', GenProject::tableName() . '.projectName', $this->project_name]);

        return $dataProvider;
    }
}
