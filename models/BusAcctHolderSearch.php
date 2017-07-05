<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BusAcctHolder;

/**
 * BusAcctHolderSearch represents the model behind the search form about `app\models\BusAcctHolder`.
 */
class BusAcctHolderSearch extends BusAcctHolder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['account_holder_id', 'business_id', 'user_id'], 'integer'],
            [['application_date'], 'safe'],
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
        $query = BusAcctHolder::find();

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
            'account_holder_id' => $this->account_holder_id,
            'business_id' => $this->business_id,
            'user_id' => $this->user_id,
            'application_date' => $this->application_date,
        ]);

        return $dataProvider;
    }
}
