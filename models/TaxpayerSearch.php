<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Taxpayer;

/**
 * TaxpayerSearch represents the model behind the search form about `app\models\Taxpayer`.
 */
class TaxpayerSearch extends Taxpayer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['taxpayer_email_add', 'taxpayer_username', 'taxpayer_password', 'taxpayer_confirm_password', 'taxpayer_fname', 'taxpayer_mname', 'taxpayer_lname', 'taxpayer_suffix_name', 'taxpayer_dob_month', 'taxpayer_dob_day', 'taxpayer_dob_year', 'taxpayer_civil_status', 'taxpayer_sex', 'taxpayer_tin', 'taxpayer_bir_app_date', 'taxpayer_address_unit_num', 'taxpayer_address_street', 'taxpayer_address_subdivision', 'taxpayer_address_barangay', 'taxpayer_contact_type', 'taxpayer_contact_detail', 'taxpayer_emergency_contact_fname', 'taxpayer_emergency_contact_mname', 'taxpayer_emergency_contact_lname', 'taxpayer_emergency_contact_suffix_name', 'taxpayer_emergency_contact_relationship', 'taxpayer_emergency_contact_number', 'taxpayer_emergency_contact_email_address', 'taxpayer_birth_date', 'taxpayer_address'], 'safe'],
            [['taxpayer_id'], 'integer'],
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
        $query = Taxpayer::find();

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
            'taxpayer_bir_app_date' => $this->taxpayer_bir_app_date,
            'taxpayer_birth_date' => $this->taxpayer_birth_date,
            'taxpayer_id' => $this->taxpayer_id,
        ]);

        $query->andFilterWhere(['like', 'taxpayer_email_add', $this->taxpayer_email_add])
            ->andFilterWhere(['like', 'taxpayer_username', $this->taxpayer_username])
            ->andFilterWhere(['like', 'taxpayer_password', $this->taxpayer_password])
            ->andFilterWhere(['like', 'taxpayer_confirm_password', $this->taxpayer_confirm_password])
            ->andFilterWhere(['like', 'taxpayer_fname', $this->taxpayer_fname])
            ->andFilterWhere(['like', 'taxpayer_mname', $this->taxpayer_mname])
            ->andFilterWhere(['like', 'taxpayer_lname', $this->taxpayer_lname])
            ->andFilterWhere(['like', 'taxpayer_suffix_name', $this->taxpayer_suffix_name])
            ->andFilterWhere(['like', 'taxpayer_dob_month', $this->taxpayer_dob_month])
            ->andFilterWhere(['like', 'taxpayer_dob_day', $this->taxpayer_dob_day])
            ->andFilterWhere(['like', 'taxpayer_dob_year', $this->taxpayer_dob_year])
            ->andFilterWhere(['like', 'taxpayer_civil_status', $this->taxpayer_civil_status])
            ->andFilterWhere(['like', 'taxpayer_sex', $this->taxpayer_sex])
            ->andFilterWhere(['like', 'taxpayer_tin', $this->taxpayer_tin])
            ->andFilterWhere(['like', 'taxpayer_address_unit_num', $this->taxpayer_address_unit_num])
            ->andFilterWhere(['like', 'taxpayer_address_street', $this->taxpayer_address_street])
            ->andFilterWhere(['like', 'taxpayer_address_subdivision', $this->taxpayer_address_subdivision])
            ->andFilterWhere(['like', 'taxpayer_address_barangay', $this->taxpayer_address_barangay])
            ->andFilterWhere(['like', 'taxpayer_contact_type', $this->taxpayer_contact_type])
            ->andFilterWhere(['like', 'taxpayer_contact_detail', $this->taxpayer_contact_detail])
            ->andFilterWhere(['like', 'taxpayer_emergency_contact_fname', $this->taxpayer_emergency_contact_fname])
            ->andFilterWhere(['like', 'taxpayer_emergency_contact_mname', $this->taxpayer_emergency_contact_mname])
            ->andFilterWhere(['like', 'taxpayer_emergency_contact_lname', $this->taxpayer_emergency_contact_lname])
            ->andFilterWhere(['like', 'taxpayer_emergency_contact_suffix_name', $this->taxpayer_emergency_contact_suffix_name])
            ->andFilterWhere(['like', 'taxpayer_emergency_contact_relationship', $this->taxpayer_emergency_contact_relationship])
            ->andFilterWhere(['like', 'taxpayer_emergency_contact_number', $this->taxpayer_emergency_contact_number])
            ->andFilterWhere(['like', 'taxpayer_emergency_contact_email_address', $this->taxpayer_emergency_contact_email_address]);
            //->andFilterWhere(['like', 'taxpayer_address', $this->taxpayer_address]);

        return $dataProvider;
    }
}
