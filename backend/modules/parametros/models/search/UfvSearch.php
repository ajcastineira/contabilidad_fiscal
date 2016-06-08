<?php

namespace backend\modules\parametros\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\parametros\models\Ufv;

/**
 * UfvSearch represents the model behind the search form about `frontend\modules\parametros\models\Ufv`.
 */
class UfvSearch extends Ufv
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['monto'], 'number'],
            [['fecha'], 'safe'],
            [['vigente'], 'boolean'],
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
        $query = Ufv::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'monto' => $this->monto,
            'fecha' => $this->fecha,
            'vigente' => $this->vigente,
        ]);

        return $dataProvider;
    }
}
