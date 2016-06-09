<?php

namespace backend\modules\asiento\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\asiento\models\DetalleAsiento;

/**
 * DetalleAsientoSearch represents the model behind the search form about `backend\modules\asiento\models\DetalleAsiento`.
 */
class DetalleAsientoSearch extends DetalleAsiento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idAsiento', 'idCuenta', 'orden'], 'integer'],
            [['debe', 'haber'], 'number'],
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
        $query = DetalleAsiento::find();

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
            'idAsiento' => $this->idAsiento,
            'idCuenta' => $this->idCuenta,
            'debe' => $this->debe,
            'haber' => $this->haber,
            'orden' => $this->orden,
        ]);

        return $dataProvider;
    }
}
