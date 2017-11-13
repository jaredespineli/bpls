<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "assessment".
 *
 * @property integer $assessment_id
 * @property double $capital_amount
 * @property double $gross_sales_tax_amt
 * @property double $gross_sales_tax_pnl
 * @property double $transport_truck_tax_amt
 * @property double $transport_truck_tax_pnl
 * @property double $hazard_storage_tax_amt
 * @property double $hazard_storage_tax_pnl
 * @property double $sign_billboard_tax_amt
 * @property double $sign_billboard_tax_pnl
 * @property double $mayors_permit_fee_amt
 * @property double $mayors_permit_fee_pnl
 * @property double $garbage_fee_amt
 * @property double $garbage_fee_pnl
 * @property double $truck_van_permit_fee_amt
 * @property double $truck_van_permit_fee_pnl
 * @property double $sanitary_permit_fee_amt
 * @property double $sanitary_permit_fee_pnl
 * @property double $bldg_insp_fee_amt
 * @property double $bldg_insp_fee_pnl
 * @property double $elec_insp_fee_amt
 * @property double $elec_insp_fee_pnl
 * @property double $mech_insp_fee_amt
 * @property double $mech_insp_fee_pnl
 * @property double $plumb_insp_fee_amt
 * @property double $plumb_insp_fee_pnl
 * @property double $sign_billboard_fee_amt
 * @property double $sign_billboard_fee_pnl
 * @property double $sign_billboard_renew_fee_amt
 * @property double $sign_billboard_renew_fee_pnl
 * @property double $hazard_storage_fee_amt
 * @property double $hazard_storage_fee_pnl
 * @property double $bfp_fee_amt
 * @property double $bfp_fee_pnl
 * @property string $assessment_date
 */
class Assessment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'assessment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['capital_amount', 'gross_sales_tax_amt', 'gross_sales_tax_pnl', 'transport_truck_tax_amt', 'transport_truck_tax_pnl', 'hazard_storage_tax_amt', 'hazard_storage_tax_pnl', 'sign_billboard_tax_amt', 'sign_billboard_tax_pnl', 'mayors_permit_fee_amt', 'mayors_permit_fee_pnl', 'garbage_fee_amt', 'garbage_fee_pnl', 'truck_van_permit_fee_amt', 'truck_van_permit_fee_pnl', 'sanitary_permit_fee_amt', 'sanitary_permit_fee_pnl', 'bldg_insp_fee_amt', 'bldg_insp_fee_pnl', 'elec_insp_fee_amt', 'elec_insp_fee_pnl', 'mech_insp_fee_amt', 'mech_insp_fee_pnl', 'plumb_insp_fee_amt', 'plumb_insp_fee_pnl', 'sign_billboard_fee_amt', 'sign_billboard_fee_pnl', 'sign_billboard_renew_fee_amt', 'sign_billboard_renew_fee_pnl', 'hazard_storage_fee_amt', 'hazard_storage_fee_pnl', 'bfp_fee_amt', 'bfp_fee_pnl', 'grand_total', 'business_tax', 'environmental_fee', 'business_plate', 'liquor', 'tobacco', 'health_card', 'medical_fee'], 'number'],
            [['assessment_date_day', 'assessment_date_year', 'business_id'], 'integer'],
            [['assessment_date', 'assessment_date_month', 'business_name', 'president_name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'assessment_id' => 'Assessment ID',
            'capital_amount' => 'Capital(Php)',
            'gross_sales_tax_amt' => 'Gross Sales Tax(Php)',
            'gross_sales_tax_pnl' => 'Gross Sales Tax Penalty(Php)',
            'transport_truck_tax_amt' => 'Transport Truck Tax(Php)',
            'transport_truck_tax_pnl' => 'Transport Truck Tax Penalty(Php)',
            'hazard_storage_tax_amt' => 'Hazard Storage Tax(Php)',
            'hazard_storage_tax_pnl' => 'Hazard Storage Tax Penalty(Php)',
            'sign_billboard_tax_amt' => 'Sign Billboard Tax(Php)',
            'sign_billboard_tax_pnl' => 'Sign Billboard Tax Penalty(Php)',
            'mayors_permit_fee_amt' => 'Mayors Permit Fee(Php)',
            'mayors_permit_fee_pnl' => 'Mayors Permit Penalty(Php)',
            'garbage_fee_amt' => 'Garbage Fee(Php)',
            'garbage_fee_pnl' => 'Garbage Penalty(Php)',
            'truck_van_permit_fee_amt' => 'Truck/Van Permit Fee(Php)',
            'truck_van_permit_fee_pnl' => 'Truck/Van Permit Penalty(Php)',
            'sanitary_permit_fee_amt' => 'Sanitary Permit Fee(Php)',
            'sanitary_permit_fee_pnl' => 'Sanitary Permit Penalty(Php)',
            'bldg_insp_fee_amt' => 'Building Inspection Fee(Php)',
            'bldg_insp_fee_pnl' => 'Building Inspection Penalty(Php)',
            'elec_insp_fee_amt' => 'Electricity Inspection Fee',
            'elec_insp_fee_pnl' => 'Electricity Inspection Penalty(Php)',
            'mech_insp_fee_amt' => 'Mechanic Inspection Fee(Php)',
            'mech_insp_fee_pnl' => 'Mechanic Inspection Penalty(Php)',
            'plumb_insp_fee_amt' => 'Plumber Inspection Fee(Php)',
            'plumb_insp_fee_pnl' => 'Plumber Inspection Penalty(Php)',
            'sign_billboard_fee_amt' => 'Sign Billboard Fee(Php)',
            'sign_billboard_fee_pnl' => 'Sign Billboard Penalty(Php)',
            'sign_billboard_renew_fee_amt' => 'Sign Billboard Renew Fee(Php)',
            'sign_billboard_renew_fee_pnl' => 'Sign Billboard Renew Penalty(Php)',
            'hazard_storage_fee_amt' => 'Hazard Storage Fee(Php)',
            'hazard_storage_fee_pnl' => 'Hazard Storage Penalty(Php)',
            'bfp_fee_amt' => 'Bureau of Fire Protection Fee(Php)',
            'bfp_fee_pnl' => 'Bureau of Fire Protection Penalty(Php)',
            'assessment_date' => 'Assessment Date',
            'assessment_date_month' => 'Assessment Date(Month)',
            'assessment_date_day' => 'Assessment Date(Day)',
            'assessment_date_year' => 'Assessment Date(Year)',
            'business_name' => 'Business Name',
            'business_id' => 'Business ID',
            'grand_total' => 'Grand Total',
            'president_name' => 'President Name',
            'business_tax' => 'Business Tax',
            'environmental_fee' => 'Environmental Protection Fee',
            'business_plate' => 'Business Plate Fee',
            'liquor' => 'Liquor',
            'tobacco' => 'Tobacco',
            'health_card' => 'Health Card',
            'medical_fee' => 'Medical Fee'
        ];
    }
}
