<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Taxpayer */

$this->title = $model->taxpayer_id;
$this->params['breadcrumbs'][] = ['label' => 'Taxpayers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taxpayer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->taxpayer_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->taxpayer_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'taxpayer_email_add:email',
            'taxpayer_username',
            'taxpayer_password',
            'taxpayer_confirm_password',
            'taxpayer_fname',
            'taxpayer_mname',
            'taxpayer_lname',
            'taxpayer_suffix_name',
            'taxpayer_dob_month',
            'taxpayer_dob_day',
            'taxpayer_dob_year',
            'taxpayer_civil_status',
            'taxpayer_sex',
            'taxpayer_tin',
            'taxpayer_bir_app_date',
            'taxpayer_address_unit_num',
            'taxpayer_address_street',
            'taxpayer_address_subdivision',
            'taxpayer_address_barangay',
            'taxpayer_contact_type',
            'taxpayer_contact_detail',
            'taxpayer_emergency_contact_fname',
            'taxpayer_emergency_contact_mname',
            'taxpayer_emergency_contact_lname',
            'taxpayer_emergency_contact_suffix_name',
            'taxpayer_emergency_contact_relationship',
            'taxpayer_emergency_contact_number',
            'taxpayer_emergency_contact_email_address:email',
            'taxpayer_birth_date',
            'taxpayer_id',
        ],
    ]) ?>

</div>
