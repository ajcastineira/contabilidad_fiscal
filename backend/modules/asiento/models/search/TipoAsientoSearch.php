<?php

namespace backend\modules\asiento\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\asiento\models\TipoAsiento;

/**
 * TipoAsientoSearch represents the model behind the search form about `backend\modules\asiento\models\TipoAsiento`.
 */
class TipoAsientoSearch extends TipoAsiento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nroDocumento', 'idEmpresa'], 'integer'],
            [['descripcion'], 'safe'],
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
        $query = TipoAsiento::find();

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
            'nroDocumento' => $this->nroDocumento,
            'estado' => $this->estado,
            'idEmpresa' => $this->idEmpresa,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
