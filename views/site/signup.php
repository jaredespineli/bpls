<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootsrap\ActiveForm */
/* @var $model app\models\SignupForm */

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-signup" style="margin: 5%; float: center;">
	<h1><?= Html::encode($this->title) ?></h1>

	<p>Please fill up the following fields to signup:</p>

	<div class="row">
		<div class="col-lg-5">
		<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>						
			<h2> Basic Information </h2>
			<?= $form->field($model, 'taxpayer_email_add') ?>
			<?= $form->field($model, 'taxpayer_username') ?>
			<?= $form->field($model, 'taxpayer_password')->passwordInput() ?>		  
			<?= $form->field($model, 'taxpayer_fname') ?>
			<?= $form->field($model, 'taxpayer_mname') ?>
			<?= $form->field($model, 'taxpayer_lname') ?>
			<?= $form->field($model, 'taxpayer_suffix_name') ?>
			<?php echo $form->field($model, 'taxpayer_dob_month')->dropDownList(['January' => 'January',
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

			<?php echo $form->field($model, 'taxpayer_dob_day')->dropDownList(['1' => '1',
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

            <?php echo $form->field($model, 'taxpayer_dob_year')->dropDownList(['1940' => '1940', '1941' => '1941', '1942' => '1942', '1943' => '1943', '1944' => '1944', '1945' => '1945', '1946' => '1946', '1947' => '1947', '1948' => '1948', '1949' => '1949', '1950' => '1950', '1951' => '1951', '1952' => '1952', '1953' => '1953', '1954' => '1954',
                                                                           '1955' => '1955', '1956' => '1956', '1957' => '1957', '1958' => '1958', '1959' => '1959', '1960' => '1960', '1961' => '1961', '1962' => '1962', '1963' => '1963', '1964' => '1964', '1965' => '1965', '1966' => '1966', '1967' => '1967', '1968' => '1968', '1969' => '1969',
                                                                           '1970' => '1970', '1971' => '1971', '1972' => '1972', '1973' => '1973', '1974' => '1974', '1975' => '1975', '1976' => '1976', '1977' => '1977', '1978' => '1978', '1979' => '1979', '1980' => '1980', '1981' => '1981', '1982' => '1982', '1983' => '1983', '1984' => '1984', 
                                                                           '1985' => '1985', '1986' => '1986', '1987' => '1987', '1988' => '1988', '1989' => '1989', '1990' => '1990', '1991' => '1991', '1992' => '1992', '1993' => '1993', '1994' => '1994', '1995' => '1995', '1996' => '1996', '1997' => '1997', '1998' => '1998', '1999' => '1999',
                                                                           '2000' => '2000', '2001' => '2001', '2002' => '2002', '2003' => '2003', '2004' => '2004', '2005' => '2005', '2006' => '2006', '2007' => '2007', '2008' => '2008', '2009' => '2009', '2010' => '2010', '2011' => '2011', '2012' => '2012', '2013' => '2013', '2014' => '2014',
                                                                           '2015' => '2015', '2016' => '2016', '2017' => '2017']); ?>                                                            	

           	<?= $form->field($model, 'taxpayer_civil_status')->dropDownList(['Single' => 'Single', 'Married' => 'Married']); ?>
           	<?= $form->field($model, 'taxpayer_sex')->dropDownList(['Male' => 'Male', 'Female' => 'Female']); ?>
           	<?= $form->field($model, 'taxpayer_tin') ?>
           	<?= $form->field($model, 'taxpayer_bir_app_date') ?>           	

            <br>
			<br>
			<h2> Address </h2>          
			<?= $form->field($model, 'taxpayer_address_unit_num') ?>
			<?= $form->field($model, 'taxpayer_address_street') ?>
			<?= $form->field($model, 'taxpayer_address_subdivision') ?>
			<?= $form->field($model, 'taxpayer_address_barangay') ?>

			<br>
			<br>
			<h2> Contact Reference </h2>  
			<?= $form->field($model, 'taxpayer_contact_type')->dropDownList(['Landline' => 'Landline', 'Mobile' => 'Mobile']); ?>
			<?= $form->field($model, 'taxpayer_contact_detail') ?>

			<br>
			<br>
			<h2> Emergency Contact </h2>  
			<?= $form->field($model, 'taxpayer_emergency_contact_fname') ?>
			<?= $form->field($model, 'taxpayer_emergency_contact_mname') ?>
			<?= $form->field($model, 'taxpayer_emergency_contact_lname') ?>
			<?= $form->field($model, 'taxpayer_emergency_contact_suffix_name') ?>			
			<?= $form->field($model, 'taxpayer_emergency_contact_relationship')->dropDownList(['Parent' => 'Parent', 'Spouse' => 'Spouse', 'Sibling' => 'Sibling', 'Child' => 'Child', 'Relative' => 'Relative']); ?>
			<?= $form->field($model, 'taxpayer_emergency_contact_number') ?>
			<?= $form->field($model, 'taxpayer_emergency_contact_email_address') ?>	

			<div class="form-group">
	        	<?= Html::submitButton('Register', ['class' => 'btn btn-success']) ?>
	    	</div>

	    <?php ActiveForm::end(); ?>
	</div>
</div>
