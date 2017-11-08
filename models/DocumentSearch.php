<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Document;

/**
 * DocumentSearch represents the model behind the search form about `app\models\Document`.
 */
class DocumentSearch extends Document
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['document_id', 'business_id'], 'integer'],
            [['document_status', 'received_by', 'date', 'barangay_clearance_status', 'zoning_clearance_status', 'sanitary_clearance_status', 'occupancy_permit_status', 'fire_safety_status', 'barangay_clearance_reason', 'zoning_clearance_reason', 'sanitary_clearance_reason', 'occupancy_permit_reason', 'fire_safety_reason', 'barangay_clearance_received_by', 'zoning_clearance_received_by', 'sanitary_clearance_received_by', 'occupancy_permit_received_by', 'fire_safety_received_by', 'barangay_clearance_date', 'zoning_clearance_date', 'sanitary_clearance_date', 'occupancy_permit_date', 'fire_safety_date'], 'safe'],
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
        $query = Document::find();

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
            'document_id' => $this->document_id,
            'business_id' => $this->business_id,
        ]);

        $query->andFilterWhere(['like', 'document_status', $this->document_status])
            ->andFilterWhere(['like', 'received_by', $this->received_by])
            ->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'barangay_clearance_status', $this->barangay_clearance_status])
            ->andFilterWhere(['like', 'zoning_clearance_status', $this->zoning_clearance_status])
            ->andFilterWhere(['like', 'sanitary_clearance_status', $this->sanitary_clearance_status])
            ->andFilterWhere(['like', 'occupancy_permit_status', $this->occupancy_permit_status])
            ->andFilterWhere(['like', 'fire_safety_status', $this->fire_safety_status])
            ->andFilterWhere(['like', 'barangay_clearance_reason', $this->barangay_clearance_reason])
            ->andFilterWhere(['like', 'zoning_clearance_reason', $this->zoning_clearance_reason])
            ->andFilterWhere(['like', 'sanitary_clearance_reason', $this->sanitary_clearance_reason])
            ->andFilterWhere(['like', 'occupancy_permit_reason', $this->occupancy_permit_reason])
            ->andFilterWhere(['like', 'fire_safety_reason', $this->fire_safety_reason])
            ->andFilterWhere(['like', 'barangay_clearance_received_by', $this->barangay_clearance_received_by])
            ->andFilterWhere(['like', 'zoning_clearance_received_by', $this->zoning_clearance_received_by])
            ->andFilterWhere(['like', 'sanitary_clearance_received_by', $this->sanitary_clearance_received_by])
            ->andFilterWhere(['like', 'occupancy_permit_received_by', $this->occupancy_permit_received_by])
            ->andFilterWhere(['like', 'fire_safety_received_by', $this->fire_safety_received_by])
            ->andFilterWhere(['like', 'barangay_clearance_date', $this->barangay_clearance_date])
            ->andFilterWhere(['like', 'zoning_clearance_date', $this->zoning_clearance_date])
            ->andFilterWhere(['like', 'sanitary_clearance_date', $this->sanitary_clearance_date])
            ->andFilterWhere(['like', 'occupancy_permit_date', $this->occupancy_permit_date])
            ->andFilterWhere(['like', 'fire_safety_date', $this->fire_safety_date]);

        return $dataProvider;
    }
}
