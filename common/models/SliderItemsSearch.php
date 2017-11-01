<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SliderItems;

/**
 * SliderItemsSearch represents the model behind the search form of `common\models\SliderItems`.
 */
class SliderItemsSearch extends SliderItems
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_slider', 'created_by', 'updated_by'], 'integer'],
            [['transition', 'slotamount', 'hideafterloop', 'hideslideonmobile', 'easein', 'easeout', 'masterspeed', 'thumb', 'rotate', 'fstransition', 'fsmasterspeed', 'fsslotamount', 'saveperformance', 'tittle', 'description', 'image', 'bgposition', 'bgfit', 'bgrepeat', 'paralax', 'layer2_text', 'layer3_text', 'layer4_text', 'created_at', 'updated_at'], 'safe'],
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
        $query = SliderItems::find();

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
            'id' => $this->id,
            'id_slider' => $this->id_slider,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'transition', $this->transition])
            ->andFilterWhere(['like', 'slotamount', $this->slotamount])
            ->andFilterWhere(['like', 'hideafterloop', $this->hideafterloop])
            ->andFilterWhere(['like', 'hideslideonmobile', $this->hideslideonmobile])
            ->andFilterWhere(['like', 'easein', $this->easein])
            ->andFilterWhere(['like', 'easeout', $this->easeout])
            ->andFilterWhere(['like', 'masterspeed', $this->masterspeed])
            ->andFilterWhere(['like', 'thumb', $this->thumb])
            ->andFilterWhere(['like', 'rotate', $this->rotate])
            ->andFilterWhere(['like', 'fstransition', $this->fstransition])
            ->andFilterWhere(['like', 'fsmasterspeed', $this->fsmasterspeed])
            ->andFilterWhere(['like', 'fsslotamount', $this->fsslotamount])
            ->andFilterWhere(['like', 'saveperformance', $this->saveperformance])
            ->andFilterWhere(['like', 'tittle', $this->tittle])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'bgposition', $this->bgposition])
            ->andFilterWhere(['like', 'bgfit', $this->bgfit])
            ->andFilterWhere(['like', 'bgrepeat', $this->bgrepeat])
            ->andFilterWhere(['like', 'paralax', $this->paralax])
            ->andFilterWhere(['like', 'layer2_text', $this->layer2_text])
            ->andFilterWhere(['like', 'layer3_text', $this->layer3_text])
            ->andFilterWhere(['like', 'layer4_text', $this->layer4_text]);

        return $dataProvider;
    }
}
