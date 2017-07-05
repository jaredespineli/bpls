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
            [['document_id', 'account_holder_id'], 'integer'],
            [['barangay_clearance', 'barangay_status', 'zoning_clearance', 'zoning_status', 'sanitary_clearance', 'sanitary_status', 'occupancy_permit', 'occupancy_status', 'fire_safety', 'fire_safety_status', 'file_path', 'sys_entry_date'], 'safe'],
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
            'sys_entry_date' => $this->sys_entry_date,
            'account_holder_id' => $this->account_holder_id,
        ]);

        $query->andFilterWhere(['like', 'barangay_clearance', $this->barangay_clearance])
            ->andFilterWhere(['like', 'barangay_status', $this->barangay_status])
            ->andFilterWhere(['like', 'zoning_clearance', $this->zoning_clearance])
            ->andFilterWhere(['like', 'zoning_status', $this->zoning_status])
            ->andFilterWhere(['like', 'sanitary_clearance', $this->sanitary_clearance])
            ->andFilterWhere(['like', 'sanitary_status', $this->sanitary_status])
            ->andFilterWhere(['like', 'occupancy_permit', $this->occupancy_permit])
            ->andFilterWhere(['like', 'occupancy_status', $this->occupancy_status])
            ->andFilterWhere(['like', 'fire_safety', $this->fire_safety])
            ->andFilterWhere(['like', 'fire_safety_status', $this->fire_safety_status])
            ->andFilterWhere(['like', 'file_path', $this->file_path]);

        return $dataProvider;
    }
}
