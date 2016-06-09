<?php

namespace backend\modules\empresa\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\empresa\models\Sucursal;

/**
 * SucursalSearch represents the model behind the search form about `backend\modules\empresa\models\Sucursal`.
 */
class SucursalSearch extends Sucursal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idEmpresa'], 'integer'],
            [['nombre', 'direccion', 'telefono'], 'safe'],
            [['central', 'estado'], 'boolean'],
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
        $query = Sucursal::find();

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
            'central' => $this->central,
            'estado' => $this->estado,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'telefono', $this->telefono]);

        return $dataProvider;
    }
}
