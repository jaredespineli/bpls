<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Renewal;

/**
 * RenewalSearch represents the model behind the search form about `app\models\Renewal`.
 */
class RenewalSearch extends Renewal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['renewal_id', 'business_id'], 'integer'],
            [['renewal_status', 'business_name'], 'safe'],
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
        $query = Renewal::find();

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
            'renewal_id' => $this->renewal_id,
            'business_id' => $this->business_id,
        ]);

        $query->andFilterWhere(['like', 'renewal_status', $this->renewal_status])
            ->andFilterWhere(['like', 'business_name', $this->business_name]);

        return $dataProvider;
    }
}
