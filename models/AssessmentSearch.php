<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Assessment;

/**
 * AssessmentSearch represents the model behind the search form about `app\models\Assessment`.
 */
class AssessmentSearch extends Assessment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['assessment_id', 'business_id'], 'integer'],
            [['capital_amount', 'gross_sales_tax_amt', 'gross_sales_tax_pnl', 'transport_truck_tax_amt', 'transport_truck_tax_pnl', 'hazard_storage_tax_amt', 'hazard_storage_tax_pnl', 'sign_billboard_tax_amt', 'sign_billboard_tax_pnl', 'mayors_permit_fee_amt', 'mayors_permit_fee_pnl', 'garbage_fee_amt', 'garbage_fee_pnl', 'truck_van_permit_fee_amt', 'truck_van_permit_fee_pnl', 'sanitary_permit_fee_amt', 'sanitary_permit_fee_pnl', 'bldg_insp_fee_amt', 'bldg_insp_fee_pnl', 'elec_insp_fee_amt', 'elec_insp_fee_pnl', 'mech_insp_fee_amt', 'mech_insp_fee_pnl', 'plumb_insp_fee_amt', 'plumb_insp_fee_pnl', 'sign_billboard_fee_amt', 'sign_billboard_fee_pnl', 'sign_billboard_renew_fee_amt', 'sign_billboard_renew_fee_pnl', 'hazard_storage_fee_amt', 'hazard_storage_fee_pnl', 'bfp_fee_amt', 'bfp_fee_pnl'], 'number'],
            [['assessment_date', 'business_name'], 'safe'],
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
        $query = Assessment::find();

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
            'assessment_id' => $this->assessment_id,
            'capital_amount' => $this->capital_amount,
            'gross_sales_tax_amt' => $this->gross_sales_tax_amt,
            'gross_sales_tax_pnl' => $this->gross_sales_tax_pnl,
            'transport_truck_tax_amt' => $this->transport_truck_tax_amt,
            'transport_truck_tax_pnl' => $this->transport_truck_tax_pnl,
            'hazard_storage_tax_amt' => $this->hazard_storage_tax_amt,
            'hazard_storage_tax_pnl' => $this->hazard_storage_tax_pnl,
            'sign_billboard_tax_amt' => $this->sign_billboard_tax_amt,
            'sign_billboard_tax_pnl' => $this->sign_billboard_tax_pnl,
            'mayors_permit_fee_amt' => $this->mayors_permit_fee_amt,
            'mayors_permit_fee_pnl' => $this->mayors_permit_fee_pnl,
            'garbage_fee_amt' => $this->garbage_fee_amt,
            'garbage_fee_pnl' => $this->garbage_fee_pnl,
            'truck_van_permit_fee_amt' => $this->truck_van_permit_fee_amt,
            'truck_van_permit_fee_pnl' => $this->truck_van_permit_fee_pnl,
            'sanitary_permit_fee_amt' => $this->sanitary_permit_fee_amt,
            'sanitary_permit_fee_pnl' => $this->sanitary_permit_fee_pnl,
            'bldg_insp_fee_amt' => $this->bldg_insp_fee_amt,
            'bldg_insp_fee_pnl' => $this->bldg_insp_fee_pnl,
            'elec_insp_fee_amt' => $this->elec_insp_fee_amt,
            'elec_insp_fee_pnl' => $this->elec_insp_fee_pnl,
            'mech_insp_fee_amt' => $this->mech_insp_fee_amt,
            'mech_insp_fee_pnl' => $this->mech_insp_fee_pnl,
            'plumb_insp_fee_amt' => $this->plumb_insp_fee_amt,
            'plumb_insp_fee_pnl' => $this->plumb_insp_fee_pnl,
            'sign_billboard_fee_amt' => $this->sign_billboard_fee_amt,
            'sign_billboard_fee_pnl' => $this->sign_billboard_fee_pnl,
            'sign_billboard_renew_fee_amt' => $this->sign_billboard_renew_fee_amt,
            'sign_billboard_renew_fee_pnl' => $this->sign_billboard_renew_fee_pnl,
            'hazard_storage_fee_amt' => $this->hazard_storage_fee_amt,
            'hazard_storage_fee_pnl' => $this->hazard_storage_fee_pnl,
            'bfp_fee_amt' => $this->bfp_fee_amt,
            'bfp_fee_pnl' => $this->bfp_fee_pnl,
            'assessment_date' => $this->assessment_date,
            'business_name' => $this->business_name,
            'business_id' => $this->business_id,
        ]);

        return $dataProvider;
    }
}
