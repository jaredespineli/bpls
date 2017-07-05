<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PaymentDetail;

/**
 * PaymentDetailSearch represents the model behind the search form about `app\models\PaymentDetail`.
 */
class PaymentDetailSearch extends PaymentDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payment_detail_id', 'pay_mode_id'], 'integer'],
            [['pay_mode', 'or_num', 'sys_entry_date'], 'safe'],
            [['capital_amount', 'gross_sales_tax', 'gross_sales_tax_amt', 'gross_sales_tax_pnl', 'transport_truck_tax', 'transport_truck_tax_amt', 'transport_truck_tax_pnl', 'hazard_storage_tax', 'hazard_storage_tax_amt', 'hazard_storage_tax_pnl', 'sign_billboard_tax', 'sign_billboard_tax_amt', 'sign_billboard_tax_pnl', 'mayors_permit_fee', 'mayors_permit_fee_amt', 'mayors_permit_fee_pnl', 'garbage_fee', 'garbage_fee_amt', 'garbage_fee_pnl', 'truck_van_permit_fee', 'truck_van_permit_fee_amt', 'truck_van_permit_fee_pnl', 'sanitary_permit_fee', 'sanitary_permit_fee_amt', 'sanitary_permit_fee_pnl', 'bldg_insp_fee', 'bldg_insp_fee_amt', 'bldg_insp_fee_pnl', 'elec_insp_fee', 'elec_insp_fee_amt', 'elec_insp_fee_pnl', 'mech_insp_fee', 'mech_insp_fee_amt', 'mech_insp_fee_pnl', 'plumb_insp_fee', 'plumb_insp_fee_amt', 'plumb_insp_fee_pnl', 'sign_billboard_fee', 'sign_billboard_fee_amt', 'sign_billboard_fee_pnl', 'sign_billboard_renew_fee', 'sign_billboard_renew_fee_amt', 'sign_billboard_renew_fee_pnl', 'hazard_storage_fee', 'hazard_storage_fee_amt', 'hazard_storage_fee_pnl', 'bfp_fee', 'bfp_fee_amt', 'bfp_fee_pnl', 'grand_total'], 'number'],
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
        $query = PaymentDetail::find();

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
            'payment_detail_id' => $this->payment_detail_id,
            'capital_amount' => $this->capital_amount,
            'gross_sales_tax' => $this->gross_sales_tax,
            'gross_sales_tax_amt' => $this->gross_sales_tax_amt,
            'gross_sales_tax_pnl' => $this->gross_sales_tax_pnl,
            'transport_truck_tax' => $this->transport_truck_tax,
            'transport_truck_tax_amt' => $this->transport_truck_tax_amt,
            'transport_truck_tax_pnl' => $this->transport_truck_tax_pnl,
            'hazard_storage_tax' => $this->hazard_storage_tax,
            'hazard_storage_tax_amt' => $this->hazard_storage_tax_amt,
            'hazard_storage_tax_pnl' => $this->hazard_storage_tax_pnl,
            'sign_billboard_tax' => $this->sign_billboard_tax,
            'sign_billboard_tax_amt' => $this->sign_billboard_tax_amt,
            'sign_billboard_tax_pnl' => $this->sign_billboard_tax_pnl,
            'mayors_permit_fee' => $this->mayors_permit_fee,
            'mayors_permit_fee_amt' => $this->mayors_permit_fee_amt,
            'mayors_permit_fee_pnl' => $this->mayors_permit_fee_pnl,
            'garbage_fee' => $this->garbage_fee,
            'garbage_fee_amt' => $this->garbage_fee_amt,
            'garbage_fee_pnl' => $this->garbage_fee_pnl,
            'truck_van_permit_fee' => $this->truck_van_permit_fee,
            'truck_van_permit_fee_amt' => $this->truck_van_permit_fee_amt,
            'truck_van_permit_fee_pnl' => $this->truck_van_permit_fee_pnl,
            'sanitary_permit_fee' => $this->sanitary_permit_fee,
            'sanitary_permit_fee_amt' => $this->sanitary_permit_fee_amt,
            'sanitary_permit_fee_pnl' => $this->sanitary_permit_fee_pnl,
            'bldg_insp_fee' => $this->bldg_insp_fee,
            'bldg_insp_fee_amt' => $this->bldg_insp_fee_amt,
            'bldg_insp_fee_pnl' => $this->bldg_insp_fee_pnl,
            'elec_insp_fee' => $this->elec_insp_fee,
            'elec_insp_fee_amt' => $this->elec_insp_fee_amt,
            'elec_insp_fee_pnl' => $this->elec_insp_fee_pnl,
            'mech_insp_fee' => $this->mech_insp_fee,
            'mech_insp_fee_amt' => $this->mech_insp_fee_amt,
            'mech_insp_fee_pnl' => $this->mech_insp_fee_pnl,
            'plumb_insp_fee' => $this->plumb_insp_fee,
            'plumb_insp_fee_amt' => $this->plumb_insp_fee_amt,
            'plumb_insp_fee_pnl' => $this->plumb_insp_fee_pnl,
            'sign_billboard_fee' => $this->sign_billboard_fee,
            'sign_billboard_fee_amt' => $this->sign_billboard_fee_amt,
            'sign_billboard_fee_pnl' => $this->sign_billboard_fee_pnl,
            'sign_billboard_renew_fee' => $this->sign_billboard_renew_fee,
            'sign_billboard_renew_fee_amt' => $this->sign_billboard_renew_fee_amt,
            'sign_billboard_renew_fee_pnl' => $this->sign_billboard_renew_fee_pnl,
            'hazard_storage_fee' => $this->hazard_storage_fee,
            'hazard_storage_fee_amt' => $this->hazard_storage_fee_amt,
            'hazard_storage_fee_pnl' => $this->hazard_storage_fee_pnl,
            'bfp_fee' => $this->bfp_fee,
            'bfp_fee_amt' => $this->bfp_fee_amt,
            'bfp_fee_pnl' => $this->bfp_fee_pnl,
            'sys_entry_date' => $this->sys_entry_date,
            'pay_mode_id' => $this->pay_mode_id,
            'grand_total' => $this->grand_total,
        ]);

        $query->andFilterWhere(['like', 'pay_mode', $this->pay_mode])
            ->andFilterWhere(['like', 'or_num', $this->or_num]);

        return $dataProvider;
    }
}
