<?php

namespace backend\modules\planCuentas\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\planCuentas\models\PlanDeCuentas;

/**
 * PlanDeCuentasSearch represents the model behind the search form about `backend\modules\planCuentas\models\PlanDeCuentas`.
 */
class PlanDeCuentasSearch extends PlanDeCuentas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idEmpresa'], 'integer'],
            [['cod', 'descripcion'], 'safe'],
            [['estado'], 'boolean'],
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
        $query = PlanDeCuentas::find();

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
            'idEmpresa' => $this->idEmpresa,
            'estado' => $this->estado,
        ]);

        $query->andFilterWhere(['like', 'cod', $this->cod])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
