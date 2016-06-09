<?php

namespace backend\modules\gestion\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\gestion\models\Gestion;

/**
 * GestionSearch represents the model behind the search form about `backend\modules\gestion\models\Gestion`.
 */
class GestionSearch extends Gestion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idEmpresa'], 'integer'],
            [['fechaInicio', 'fechafin', 'descripcion'], 'safe'],
            [['cerrado'], 'boolean'],
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
        $query = Gestion::find();

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
            'fechaInicio' => $this->fechaInicio,
            'fechafin' => $this->fechafin,
            'cerrado' => $this->cerrado,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
