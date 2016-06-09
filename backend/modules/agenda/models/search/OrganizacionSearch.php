<?php

namespace backend\modules\agenda\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\agenda\models\Organizacion;

/**
 * OrganizacionSearch represents the model behind the search form about `backend\modules\agenda\models\Organizacion`.
 */
class OrganizacionSearch extends Organizacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tipoEmpresa'], 'integer'],
            [['nombreRazonSocial', 'paginaWeb'], 'safe'],
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
        $query = Organizacion::find();

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
            'tipoEmpresa' => $this->tipoEmpresa,
        ]);

        $query->andFilterWhere(['like', 'nombreRazonSocial', $this->nombreRazonSocial])
            ->andFilterWhere(['like', 'paginaWeb', $this->paginaWeb]);

        return $dataProvider;
    }
}
