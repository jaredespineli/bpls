<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Progress;

/**
 * ProgressSearch represents the model behind the search form about `app\models\Progress`.
 */
class ProgressSearch extends Progress
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['progress_id', 'account_holder_id'], 'integer'],
            [['business_information', 'documents', 'assessment', 'payment', 'approval'], 'safe'],
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
        $query = Progress::find();

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
            'progress_id' => $this->progress_id,
            'account_holder_id' => $this->account_holder_id,
        ]);

        $query->andFilterWhere(['like', 'business_information', $this->business_information])
            ->andFilterWhere(['like', 'documents', $this->documents])
            ->andFilterWhere(['like', 'assessment', $this->assessment])
            ->andFilterWhere(['like', 'payment', $this->payment])
            ->andFilterWhere(['like', 'approval', $this->approval]);

        return $dataProvider;
    }
}
