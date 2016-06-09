<?php

namespace backend\modules\compra\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\compra\models\Compra;

/**
 * CompraSearch represents the model behind the search form about `backend\modules\compra\models\Compra`.
 */
class CompraSearch extends Compra
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idAgenda', 'idAsiento', 'idSucursal', 'tipoCompra'], 'integer'],
            [['nroFactura', 'nroPoliza', 'nroAutorizacion', 'codControl', 'fechaRegistroSistema', 'fecha'], 'safe'],
            [['impFactura', 'tipoCambio', 'ufv', 'importeICE', 'importeExentos'], 'number'],
            [['eliminado', 'conAsientoModelo'], 'boolean'],
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
        $query = Compra::find();

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
            'impFactura' => $this->impFactura,
            'tipoCambio' => $this->tipoCambio,
            'ufv' => $this->ufv,
            'fechaRegistroSistema' => $this->fechaRegistroSistema,
            'importeICE' => $this->importeICE,
            'fecha' => $this->fecha,
            'importeExentos' => $this->importeExentos,
            'eliminado' => $this->eliminado,
            'tipoCompra' => $this->tipoCompra,
            'conAsientoModelo' => $this->conAsientoModelo,
        ]);

        $query->andFilterWhere(['like', 'nroFactura', $this->nroFactura])
            ->andFilterWhere(['like', 'nroPoliza', $this->nroPoliza])
            ->andFilterWhere(['like', 'nroAutorizacion', $this->nroAutorizacion])
            ->andFilterWhere(['like', 'codControl', $this->codControl]);

        return $dataProvider;
    }
}
