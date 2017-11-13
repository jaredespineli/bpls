<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Assessment */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="assessment-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>
    
    <?= $form->field($model, 'capital_amount')->textInput(['readonly' => true, 'value' => $model->capital_amount]) ?>

    <?= $form->field($model, 'gross_sales_tax_amt')->textInput() ?>

    <?= $form->field($model, 'gross_sales_tax_pnl')->textInput() ?>

    <?= $form->field($model, 'transport_truck_tax_amt')->textInput() ?>

    <?= $form->field($model, 'transport_truck_tax_pnl')->textInput() ?>

    <?= $form->field($model, 'hazard_storage_tax_amt')->textInput() ?>

    <?= $form->field($model, 'hazard_storage_tax_pnl')->textInput() ?>

    <?= $form->field($model, 'sign_billboard_tax_amt')->textInput() ?>

    <?= $form->field($model, 'sign_billboard_tax_pnl')->textInput() ?>

    <?= $form->field($model, 'mayors_permit_fee_amt')->textInput() ?>

    <?= $form->field($model, 'mayors_permit_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'garbage_fee_amt')->textInput() ?>

    <?= $form->field($model, 'garbage_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'truck_van_permit_fee_amt')->textInput() ?>

    <?= $form->field($model, 'truck_van_permit_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'sanitary_permit_fee_amt')->textInput() ?>

    <?= $form->field($model, 'sanitary_permit_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'bldg_insp_fee_amt')->textInput() ?>

    <?= $form->field($model, 'bldg_insp_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'elec_insp_fee_amt')->textInput() ?>

    <?= $form->field($model, 'elec_insp_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'mech_insp_fee_amt')->textInput() ?>

    <?= $form->field($model, 'mech_insp_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'plumb_insp_fee_amt')->textInput() ?>

    <?= $form->field($model, 'plumb_insp_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'sign_billboard_fee_amt')->textInput() ?>

    <?= $form->field($model, 'sign_billboard_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'sign_billboard_renew_fee_amt')->textInput() ?>

    <?= $form->field($model, 'sign_billboard_renew_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'hazard_storage_fee_amt')->textInput() ?>

    <?= $form->field($model, 'hazard_storage_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'bfp_fee_amt')->textInput() ?>

    <?= $form->field($model, 'bfp_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'business_tax')->textInput() ?>

    <?= $form->field($model, 'environmental_fee')->textInput() ?>

    <?= $form->field($model, 'business_plate')->textInput() ?>

    <?= $form->field($model, 'liquor')->textInput() ?>

    <?= $form->field($model, 'tobacco')->textInput() ?>

    <?= $form->field($model, 'health_card')->textInput() ?>

    <?= $form->field($model, 'medical_fee')->textInput() ?>

    <?php echo $form->field($model, 'assessment_date_month')->dropDownList(['January' => 'January',
                                                                            'February' => 'February',
                                                                            'March' => 'March',
                                                                            'April' => 'April',
                                                                            'May' => 'May',
                                                                            'June' => 'June',
                                                                            'July' => 'July',
                                                                            'August' => 'August',
                                                                            'September' => 'September',
                                                                            'October' => 'October',
                                                                            'November' => 'November',
                                                                            'December' => 'December']); ?>

    <?php echo $form->field($model, 'assessment_date_day')->dropDownList(['1' => '1',
                                                                          '2' => '2',
                                                                          '3' => '3',
                                                                          '4' => '4',
                                                                          '5' => '5',
                                                                          '6' => '6',
                                                                          '7' => '7',
                                                                          '8' => '8',
                                                                          '9' => '9',
                                                                          '10' => '10',
                                                                          '11' => '11',
                                                                          '12' => '12',
                                                                          '13' => '13',
                                                                          '14' => '14',
                                                                          '15' => '15',
                                                                          '16' => '16',
                                                                          '17' => '17',
                                                                          '18' => '18',
                                                                          '19' => '19',
                                                                          '20' => '20',
                                                                          '21' => '21',
                                                                          '22' => '22',
                                                                          '23' => '23',
                                                                          '24' => '24',
                                                                          '25' => '25',
                                                                          '26' => '26',
                                                                          '27' => '27',
                                                                          '28' => '28',
                                                                          '29' => '29',
                                                                          '30' => '30',
                                                                          '31' => '31',]); ?>

    <?php echo $form->field($model, 'assessment_date_year')->dropDownList(['1940' => '1940', '1941' => '1941', '1942' => '1942', '1943' => '1943', '1944' => '1944', '1945' => '1945', '1946' => '1946', '1947' => '1947', '1948' => '1948', '1949' => '1949', '1950' => '1950', '1951' => '1951', '1952' => '1952', '1953' => '1953', '1954' => '1954',
                                                                           '1955' => '1955', '1956' => '1956', '1957' => '1957', '1958' => '1958', '1959' => '1959', '1960' => '1960', '1961' => '1961', '1962' => '1962', '1963' => '1963', '1964' => '1964', '1965' => '1965', '1966' => '1966', '1967' => '1967', '1968' => '1968', '1969' => '1969',
                                                                           '1970' => '1970', '1971' => '1971', '1972' => '1972', '1973' => '1973', '1974' => '1974', '1975' => '1975', '1976' => '1976', '1977' => '1977', '1978' => '1978', '1979' => '1979', '1980' => '1980', '1981' => '1981', '1982' => '1982', '1983' => '1983', '1984' => '1984', 
                                                                           '1985' => '1985', '1986' => '1986', '1987' => '1987', '1988' => '1988', '1989' => '1989', '1990' => '1990', '1991' => '1991', '1992' => '1992', '1993' => '1993', '1994' => '1994', '1995' => '1995', '1996' => '1996', '1997' => '1997', '1998' => '1998', '1999' => '1999',
                                                                           '2000' => '2000', '2001' => '2001', '2002' => '2002', '2003' => '2003', '2004' => '2004', '2005' => '2005', '2006' => '2006', '2007' => '2007', '2008' => '2008', '2009' => '2009', '2010' => '2010', '2011' => '2011', '2012' => '2012', '2013' => '2013', '2014' => '2014',
                                                                           '2015' => '2015', '2016' => '2016', '2017' => '2017']); ?>


            <br>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
