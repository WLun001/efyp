<?php

namespace app\modules\students\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\students\models\Ganttchart;

/**
 * GanttchartSearch represents the model behind the search form about `app\modules\students\models\Ganttchart`.
 */
class GanttchartSearch extends Ganttchart
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'start', 'end'], 'integer'],
            [['activity', 'datecompletion', 'studentID_fk'], 'safe'],
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
        $query = Ganttchart::find();

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
            'id' => $this->id,
            'start' => $this->start,
            'end' => $this->end,
            'datecompletion' => $this->datecompletion,
        ]);

        $query->andFilterWhere(['like', 'activity', $this->activity])
            ->andFilterWhere(['like', 'studentID_fk', $this->studentID_fk]);

        return $dataProvider;
    }
}
