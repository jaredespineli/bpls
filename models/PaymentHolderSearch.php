<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PaymentHolder;

/**
 * PaymentHolderSearch represents the model behind the search form about `app\models\PaymentHolder`.
 */
class PaymentHolderSearch extends PaymentHolder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payment_holder_id', 'account_holder_id', 'business_id'], 'integer'],
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
        $query = PaymentHolder::find();

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
            'payment_holder_id' => $this->payment_holder_id,
            'account_holder_id' => $this->account_holder_id,
            'business_id' => $this->business_id,
        ]);

        return $dataProvider;
    }
}
