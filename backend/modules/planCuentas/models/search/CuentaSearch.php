<?php

namespace backend\modules\planCuentas\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\planCuentas\models\Cuenta;

/**
 * CuentaSearch represents the model behind the search form about `backend\modules\planCuentas\models\Cuenta`.
 */
class CuentaSearch extends Cuenta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idPlandeCuentas', 'idcuentaPadre', 'ordenCuenta', 'tipo'], 'integer'],
            [['codigo', 'descripcion', 'tipoCuenta'], 'safe'],
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
        $query = Cuenta::find();

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
            'idPlandeCuentas' => $this->idPlandeCuentas,
            'idcuentaPadre' => $this->idcuentaPadre,
            'ordenCuenta' => $this->ordenCuenta,
            'tipo' => $this->tipo,
        ]);

        $query->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'tipoCuenta', $this->tipoCuenta]);

        return $dataProvider;
    }
}
