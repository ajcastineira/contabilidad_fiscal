<?php

namespace backend\modules\venta\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\venta\models\Venta;

/**
 * VentaSearch represents the model behind the search form about `backend\modules\venta\models\Venta`.
 */
class VentaSearch extends Venta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idAgenda', 'idAsiento', 'idSucursal'], 'integer'],
            [['nroFactura', 'nroAutorizacion', 'codControl', 'fechaRegistroSistema', 'fecha'], 'safe'],
            [['impTotal', 'tipoCambio', 'uvf', 'importeICE', 'importeExentos'], 'number'],
            [['estadoFactura', 'eliminado', 'conAsientoModelo'], 'boolean'],
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
        $query = Venta::find();

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
            'idAgenda' => $this->idAgenda,
            'idAsiento' => $this->idAsiento,
            'idSucursal' => $this->idSucursal,
            'impTotal' => $this->impTotal,
            'estadoFactura' => $this->estadoFactura,
            'tipoCambio' => $this->tipoCambio,
            'uvf' => $this->uvf,
            'fechaRegistroSistema' => $this->fechaRegistroSistema,
            'importeICE' => $this->importeICE,
            'fecha' => $this->fecha,
            'importeExentos' => $this->importeExentos,
            'eliminado' => $this->eliminado,
            'conAsientoModelo' => $this->conAsientoModelo,
        ]);

        $query->andFilterWhere(['like', 'nroFactura', $this->nroFactura])
            ->andFilterWhere(['like', 'nroAutorizacion', $this->nroAutorizacion])
            ->andFilterWhere(['like', 'codControl', $this->codControl]);

        return $dataProvider;
    }
}
