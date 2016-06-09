<?php

namespace backend\modules\asiento\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\asiento\models\Asiento;

/**
 * AsientoSearch represents the model behind the search form about `backend\modules\asiento\models\Asiento`.
 */
class AsientoSearch extends Asiento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idTipoAsiento', 'idGestion', 'idSucursal', 'nombreAsiento', 'nroDocumento'], 'integer'],
            [['fecha', 'glosa', 'fechaRegistroSistema'], 'safe'],
            [['ufv', 'tipoCambio'], 'number'],
            [['anulado'], 'boolean'],
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
        $query = Asiento::find();

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
            'idTipoAsiento' => $this->idTipoAsiento,
            'idGestion' => $this->idGestion,
            'idSucursal' => $this->idSucursal,
            'fecha' => $this->fecha,
            'ufv' => $this->ufv,
            'fechaRegistroSistema' => $this->fechaRegistroSistema,
            'anulado' => $this->anulado,
            'nombreAsiento' => $this->nombreAsiento,
            'tipoCambio' => $this->tipoCambio,
            'nroDocumento' => $this->nroDocumento,
        ]);

        $query->andFilterWhere(['like', 'glosa', $this->glosa]);

        return $dataProvider;
    }
}
