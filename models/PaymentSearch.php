<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Payment;

/**
 * PaymentSearch represents the model behind the search form about `app\models\Payment`.
 */
class PaymentSearch extends Payment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payment_id', 'assessment_id', 'payment_quarter', 'payment_annually', 'payment_bi_annually', 'year'], 'integer'],
            [['or_number', 'business_name', 'payment_status', 'payment_kind', 'president_name', 'date', 'received_by', 'payment_status_per'], 'safe'],
            [['grand_total', 'assessed_value', 'quarter_assessment'], 'number'],
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
        $query = Payment::find();

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
            'payment_id' => $this->payment_id,
            'assessment_id' => $this->assessment_id,
            'grand_total' => $this->grand_total,
            'payment_quarter' => $this->payment_quarter,
            'payment_annually' => $this->payment_annually,
            'payment_bi_annually' => $this->payment_bi_annually,
            'assessed_value' => $this->assessed_value,
            'quarter_assessment' => $this->quarter_assessment,
            'year' => $this->year,
        ]);

        $query->andFilterWhere(['like', 'or_number', $this->or_number])
            ->andFilterWhere(['like', 'business_name', $this->business_name])
            ->andFilterWhere(['like', 'payment_status', $this->payment_status])
            ->andFilterWhere(['like', 'payment_kind', $this->payment_kind])
            ->andFilterWhere(['like', 'president_name', $this->president_name])
            ->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'received_by', $this->received_by])
            ->andFilterWhere(['like', 'payment_status_per', $this->payment_status_per]);

        return $dataProvider;
    }
}
