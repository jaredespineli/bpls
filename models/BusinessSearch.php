<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Business;

/**
 * BusinessSearch represents the model behind the search form about `app\models\Business`.
 */
class BusinessSearch extends Business
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'lessor_business_id', 'employee_count', 'isActive', 'permit_no'], 'integer'],
            [['capital_amount', 'business_area'], 'number'],
            [['sys_entry_date'], 'safe'],
            [['business_name', 'trade_name', 'president_name', 'org_type', 'ein', 'tin', 'lob_code', 'lob_desc', 'tel_num', 'website_url', 'bldg_num', 'bldg_name', 'unit_num', 'street', 'subdivision', 'barangay', 'property_index_num', 'has_lessor', 'sss_ref', 'sec_ref', 'dti_ref', 'cda_ref', 'fsic_ref', 'application_barcode', 'barangay_barcode', 'zoning_barcode', 'sanitary_barcode', 'occupancy_barcode', 'others_one_barcode', 'others_two_barcode', 'others_three_barcode', 'others_four_barcode', 'tax_payment_type', 'status', 'full_address', 'pay_mode', 'postal_code', 'business_status'], 'string', 'max' => 255],
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
        $query = Business::find();

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
            'business_id' => $this->business_id,
            'user_id' => $this->user_id,
            'capital_amount' => $this->capital_amount,
            'lessor_business_id' => $this->lessor_business_id,
            'business_area' => $this->business_area,
            'employee_count' => $this->employee_count,
            //'sys_entry_date_year' => $this->sys_entry_date_year,
            'sys_entry_date' => $this->sys_entry_date,
        ]);

        $query->andFilterWhere(['like', 'business_name', $this->business_name])
            ->andFilterWhere(['like', 'trade_name', $this->trade_name])
            ->andFilterWhere(['like', 'president_name', $this->president_name])
            ->andFilterWhere(['like', 'org_type', $this->org_type])
            ->andFilterWhere(['like', 'ein', $this->ein])
            ->andFilterWhere(['like', 'tin', $this->tin])
            ->andFilterWhere(['like', 'lob_code', $this->lob_code])
            ->andFilterWhere(['like', 'lob_desc', $this->lob_desc])
            ->andFilterWhere(['like', 'tel_num', $this->tel_num])
            ->andFilterWhere(['like', 'website_url', $this->website_url])
            ->andFilterWhere(['like', 'bldg_num', $this->bldg_num])
            ->andFilterWhere(['like', 'bldg_name', $this->bldg_name])
            ->andFilterWhere(['like', 'unit_num', $this->unit_num])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'subdivision', $this->subdivision])
            ->andFilterWhere(['like', 'barangay', $this->barangay])
            ->andFilterWhere(['like', 'property_index_num', $this->property_index_num])
            ->andFilterWhere(['like', 'has_lessor', $this->has_lessor])
            ->andFilterWhere(['like', 'sss_ref', $this->sss_ref])
            ->andFilterWhere(['like', 'sec_ref', $this->sec_ref])
            ->andFilterWhere(['like', 'dti_ref', $this->dti_ref])
            ->andFilterWhere(['like', 'cda_ref', $this->cda_ref])
            ->andFilterWhere(['like', 'fsic_ref', $this->fsic_ref])
            ->andFilterWhere(['like', 'application_barcode', $this->application_barcode])
            ->andFilterWhere(['like', 'barangay_barcode', $this->barangay_barcode])
            ->andFilterWhere(['like', 'zoning_barcode', $this->zoning_barcode])
            ->andFilterWhere(['like', 'sanitary_barcode', $this->sanitary_barcode])
            ->andFilterWhere(['like', 'occupancy_barcode', $this->occupancy_barcode])
            ->andFilterWhere(['like', 'others_one_barcode', $this->others_one_barcode])
            ->andFilterWhere(['like', 'others_two_barcode', $this->others_two_barcode])
            ->andFilterWhere(['like', 'others_three_barcode', $this->others_three_barcode])
            ->andFilterWhere(['like', 'others_four_barcode', $this->others_four_barcode])
            ->andFilterWhere(['like', 'tax_payment_type', $this->tax_payment_type])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'full_address', $this->full_address])
            ->andFilterWhere(['like', 'pay_mode', $this->pay_mode])
            ->andFilterWhere(['like', 'postal_code', $this->postal_code]);            

        return $dataProvider;
    }
}
