<?php

namespace backend\modules\agenda\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\agenda\models\AgendaEmpresa;

/**
 * AgendaEmpresaSearch represents the model behind the search form about `backend\modules\agenda\models\AgendaEmpresa`.
 */
class AgendaEmpresaSearch extends AgendaEmpresa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idAgenda', 'idEmpresa'], 'integer'],
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
        $query = AgendaEmpresa::find();

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
            'idAgenda' => $this->idAgenda,
            'idEmpresa' => $this->idEmpresa,
            'estado' => $this->estado,
        ]);

        return $dataProvider;
    }
}
