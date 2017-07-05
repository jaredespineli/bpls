<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PayMode;

/**
 * PayModeSearch represents the model behind the search form about `app\models\PayMode`.
 */
class PayModeSearch extends PayMode
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pay_mode_id', 'payment_holder_id'], 'integer'],
            [['due_date', 'or_num', 'name'], 'safe'],
            [['amount_due', 'amount_id'], 'number'],
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
        $query = PayMode::find();

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
            'pay_mode_id' => $this->pay_mode_id,
            'due_date' => $this->due_date,
            'amount_due' => $this->amount_due,
            'payment_holder_id' => $this->payment_holder_id,
            'amount_id' => $this->amount_id,
        ]);

        $query->andFilterWhere(['like', 'or_num', $this->or_num])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
