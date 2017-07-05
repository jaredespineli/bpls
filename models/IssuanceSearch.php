<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Issuance;

/**
 * IssuanceSearch represents the model behind the search form about `app\models\Issuance`.
 */
class IssuanceSearch extends Issuance
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['issuance_id', 'approval_id'], 'integer'],
            [['business_reg_num', 'full_business_name', 'or_reference', 'or_reference_date', 'released_to', 'scheduled_release_date', 'actual_release_date', 'issuance_barcode_ref', 'issued_by_name', 'issuance_by_id', 'sys_entry_date'], 'safe'],
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
        $query = Issuance::find();

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
            'issuance_id' => $this->issuance_id,
            'approval_id' => $this->approval_id,
            'or_reference_date' => $this->or_reference_date,
            'scheduled_release_date' => $this->scheduled_release_date,
            'actual_release_date' => $this->actual_release_date,
            'sys_entry_date' => $this->sys_entry_date,
        ]);

        $query->andFilterWhere(['like', 'business_reg_num', $this->business_reg_num])
            ->andFilterWhere(['like', 'full_business_name', $this->full_business_name])
            ->andFilterWhere(['like', 'or_reference', $this->or_reference])
            ->andFilterWhere(['like', 'released_to', $this->released_to])
            ->andFilterWhere(['like', 'issuance_barcode_ref', $this->issuance_barcode_ref])
            ->andFilterWhere(['like', 'issued_by_name', $this->issued_by_name])
            ->andFilterWhere(['like', 'issuance_by_id', $this->issuance_by_id]);

        return $dataProvider;
    }
}
