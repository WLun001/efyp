<?php

namespace app\modules\students\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\students\models\Roles;

/**
 * RolesSearch represents the model behind the search form about `app\modules\students\models\Roles`.
 */
class RolesSearch extends Roles
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['roleID'], 'integer'],
            [['roles'], 'safe'],
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
        $query = Roles::find();

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
            'roleID' => $this->roleID,
        ]);

        $query->andFilterWhere(['like', 'roles', $this->roles]);

        return $dataProvider;
    }
}
