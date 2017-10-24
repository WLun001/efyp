<?php

namespace app\modules\students\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\students\models\Departments;

/**
 * DepartmentsSearch represents the model behind the search form about `app\modules\students\models\Departments`.
 */
class DepartmentsSearch extends Departments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['department'], 'safe'],
            [['faculty_fk'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Departments::find();

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
            'faculty_fk' => $this->faculty_fk,
        ]);

        $query->andFilterWhere(['like', 'department', $this->department]);

        return $dataProvider;
    }
}
