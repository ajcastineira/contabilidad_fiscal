<?php

namespace backend\modules\docificacion\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\docificacion\models\Docificacion;

/**
 * DocificacionSearch represents the model behind the search form about `backend\modules\docificacion\models\Docificacion`.
 */
class DocificacionSearch extends Docificacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idEmpresa', 'nroOrden'], 'integer'],
            [['fechaVencimiento'], 'safe'],
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
        $query = Docificacion::find();

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
            'nroOrden' => $this->nroOrden,
            'fechaVencimiento' => $this->fechaVencimiento,
            'estado' => $this->estado,
        ]);

        return $dataProvider;
    }
}
