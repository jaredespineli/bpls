<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Approval;

/**
 * ApprovalSearch represents the model behind the search form about `app\models\Approval`.
 */
class ApprovalSearch extends Approval
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['approval_id', 'account_holder_id', 'business_id'], 'integer'],
            [['sic_code', 'property_index_code', 'postal_code', 'full_business_name', 'remarks', 'approval_status', 'business_reg_num', 'action_date', 'approval_date', 'issue_date', 'next_renewal_date', 'sys_entry_date'], 'safe'],
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
        $query = Approval::find();

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
            'approval_id' => $this->approval_id,
            'action_date' => $this->action_date,
            'approval_date' => $this->approval_date,
            'issue_date' => $this->issue_date,
            'next_renewal_date' => $this->next_renewal_date,
            'sys_entry_date' => $this->sys_entry_date,
            'account_holder_id' => $this->account_holder_id,
            'business_id' => $this->business_id,
        ]);

        $query->andFilterWhere(['like', 'sic_code', $this->sic_code])
            ->andFilterWhere(['like', 'property_index_code', $this->property_index_code])
            ->andFilterWhere(['like', 'postal_code', $this->postal_code])
            ->andFilterWhere(['like', 'full_business_name', $this->full_business_name])
            ->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'approval_status', $this->approval_status])
            ->andFilterWhere(['like', 'business_reg_num', $this->business_reg_num]);

        return $dataProvider;
    }
}
