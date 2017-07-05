<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bus_acct_detail".
 *
 * @property integer $account_detail_id
 * @property integer $account_holder_id
 * @property string $pay_mode
 * @property double $capital_amount
 * @property double $gross_sales_tax
 * @property double $gross_sales_tax_amt
 * @property double $gross_sales_tax_pnl
 * @property double $transport_truck_tax
 * @property double $transport_truck_tax_amt
 * @property double $transport_truck_tax_pnl
 * @property double $sign_billboard_tax
 * @property double $sign_billboard_tax_amt
 * @property double $sign_billboard_tax_pnl
 * @property double $mayors_permit_fee
 * @property double $mayors_permit_fee_amt
 * @property double $mayors_permit_fee_pnl
 * @property double $garbage_fee
 * @property double $garbage_fee_amt
 * @property double $garbage_fee_pnl
 * @property double $truck_van_permit_fee
 * @property double $truck_van_permit_fee_amt
 * @property double $truck_van_permit_fee_pnl
 * @property double $sanitary_permit_fee
 * @property double $sanitary_permit_fee_amt
 * @property double $sanitary_permit_fee_pnl
 * @property double $bldg_insp_fee
 * @property double $bldg_insp_fee_pnl
 * @property double $bldg_insp_fee_amt
 * @property double $elec_insp_fee
 * @property double $elec_insp_fee_amt
 * @property double $elec_insp_fee_pnl
 * @property double $mech_insp_fee
 * @property double $mech_insp_fee_amt
 * @property double $mech_insp_fee_pnl
 * @property double $plumb_insp_fee
 * @property double $plumb_insp_fee_amt
 * @property double $plumb_insp_fee_pnl
 * @property double $sign_billboard_fee
 * @property double $sign_billboard_fee_amt
 * @property double $sign_billboard_fee_pnl
 * @property double $sign_billboard_renew_fee
 * @property double $sign_billboard_renew_fee_amt
 * @property double $sign_billboard_renew_fee_pnl
 * @property double $hazard_storage_fee
 * @property double $hazard_storage_fee_amt
 * @property double $hazard_storage_fee_pnl
 * @property double $bfp_fee
 * @property double $bfp_fee_amt
 * @property double $bfp_fee_pnl
 * @property double $grand_total
 * @property string $sys_entry_date
 * @property double $hazard_storage_tax
 * @property double $hazard_storage_tax_amt
 * @property double $hazard_storage_tax_pnl
 */
class BusAcctDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bus_acct_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['account_detail_id'], 'required'],
            [['account_detail_id', 'account_holder_id'], 'integer'],
            [['capital_amount', 'gross_sales_tax', 'gross_sales_tax_amt', 'gross_sales_tax_pnl', 'transport_truck_tax', 'transport_truck_tax_amt', 'transport_truck_tax_pnl', 'sign_billboard_tax', 'sign_billboard_tax_amt', 'sign_billboard_tax_pnl', 'mayors_permit_fee', 'mayors_permit_fee_amt', 'mayors_permit_fee_pnl', 'garbage_fee', 'garbage_fee_amt', 'garbage_fee_pnl', 'truck_van_permit_fee', 'truck_van_permit_fee_amt', 'truck_van_permit_fee_pnl', 'sanitary_permit_fee', 'sanitary_permit_fee_amt', 'sanitary_permit_fee_pnl', 'bldg_insp_fee', 'bldg_insp_fee_pnl', 'bldg_insp_fee_amt', 'elec_insp_fee', 'elec_insp_fee_amt', 'elec_insp_fee_pnl', 'mech_insp_fee', 'mech_insp_fee_amt', 'mech_insp_fee_pnl', 'plumb_insp_fee', 'plumb_insp_fee_amt', 'plumb_insp_fee_pnl', 'sign_billboard_fee', 'sign_billboard_fee_amt', 'sign_billboard_fee_pnl', 'sign_billboard_renew_fee', 'sign_billboard_renew_fee_amt', 'sign_billboard_renew_fee_pnl', 'hazard_storage_fee', 'hazard_storage_fee_amt', 'hazard_storage_fee_pnl', 'bfp_fee', 'bfp_fee_amt', 'bfp_fee_pnl', 'grand_total', 'hazard_storage_tax', 'hazard_storage_tax_amt', 'hazard_storage_tax_pnl'], 'number'],
            [['sys_entry_date'], 'safe'],
            [['pay_mode'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'account_detail_id' => 'Account Detail ID',
            'account_holder_id' => 'Account Holder ID',
            'pay_mode' => 'Pay Mode',
            'capital_amount' => 'Capital Amount',
            'gross_sales_tax' => 'Gross Sales Tax',
            'gross_sales_tax_amt' => 'Gross Sales Tax Amt',
            'gross_sales_tax_pnl' => 'Gross Sales Tax Pnl',
            'transport_truck_tax' => 'Transport Truck Tax',
            'transport_truck_tax_amt' => 'Transport Truck Tax Amt',
            'transport_truck_tax_pnl' => 'Transport Truck Tax Pnl',
            'sign_billboard_tax' => 'Sign Billboard Tax',
            'sign_billboard_tax_amt' => 'Sign Billboard Tax Amt',
            'sign_billboard_tax_pnl' => 'Sign Billboard Tax Pnl',
            'mayors_permit_fee' => 'Mayors Permit Fee',
            'mayors_permit_fee_amt' => 'Mayors Permit Fee Amt',
            'mayors_permit_fee_pnl' => 'Mayors Permit Fee Pnl',
            'garbage_fee' => 'Garbage Fee',
            'garbage_fee_amt' => 'Garbage Fee Amt',
            'garbage_fee_pnl' => 'Garbage Fee Pnl',
            'truck_van_permit_fee' => 'Truck Van Permit Fee',
            'truck_van_permit_fee_amt' => 'Truck Van Permit Fee Amt',
            'truck_van_permit_fee_pnl' => 'Truck Van Permit Fee Pnl',
            'sanitary_permit_fee' => 'Sanitary Permit Fee',
            'sanitary_permit_fee_amt' => 'Sanitary Permit Fee Amt',
            'sanitary_permit_fee_pnl' => 'Sanitary Permit Fee Pnl',
            'bldg_insp_fee' => 'Bldg Insp Fee',
            'bldg_insp_fee_pnl' => 'Bldg Insp Fee Pnl',
            'bldg_insp_fee_amt' => 'Bldg Insp Fee Amt',
            'elec_insp_fee' => 'Elec Insp Fee',
            'elec_insp_fee_amt' => 'Elec Insp Fee Amt',
            'elec_insp_fee_pnl' => 'Elec Insp Fee Pnl',
            'mech_insp_fee' => 'Mech Insp Fee',
            'mech_insp_fee_amt' => 'Mech Insp Fee Amt',
            'mech_insp_fee_pnl' => 'Mech Insp Fee Pnl',
            'plumb_insp_fee' => 'Plumb Insp Fee',
            'plumb_insp_fee_amt' => 'Plumb Insp Fee Amt',
            'plumb_insp_fee_pnl' => 'Plumb Insp Fee Pnl',
            'sign_billboard_fee' => 'Sign Billboard Fee',
            'sign_billboard_fee_amt' => 'Sign Billboard Fee Amt',
            'sign_billboard_fee_pnl' => 'Sign Billboard Fee Pnl',
            'sign_billboard_renew_fee' => 'Sign Billboard Renew Fee',
            'sign_billboard_renew_fee_amt' => 'Sign Billboard Renew Fee Amt',
            'sign_billboard_renew_fee_pnl' => 'Sign Billboard Renew Fee Pnl',
            'hazard_storage_fee' => 'Hazard Storage Fee',
            'hazard_storage_fee_amt' => 'Hazard Storage Fee Amt',
            'hazard_storage_fee_pnl' => 'Hazard Storage Fee Pnl',
            'bfp_fee' => 'Bfp Fee',
            'bfp_fee_amt' => 'Bfp Fee Amt',
            'bfp_fee_pnl' => 'Bfp Fee Pnl',
            'grand_total' => 'Grand Total',
            'sys_entry_date' => 'Sys Entry Date',
            'hazard_storage_tax' => 'Hazard Storage Tax',
            'hazard_storage_tax_amt' => 'Hazard Storage Tax Amt',
            'hazard_storage_tax_pnl' => 'Hazard Storage Tax Pnl',
        ];
    }
}
