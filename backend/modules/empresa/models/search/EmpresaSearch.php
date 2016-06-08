<?php

namespace backend\modules\empresa\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\empresa\models\Empresa;

/**
 * EmpresaSearch represents the model behind the search form about `frontend\modules\empresa\models\Empresa`.
 */
class EmpresaSearch extends Empresa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tipo'], 'integer'],
            [['nombre', 'razonSocial', 'nit', 'direccion', 'cod', 'telefono', 'paginaWeb', 'email', 'observaciones', 'logo', 'nombreContacto', 'telefonoContacto', 'direccionContacto', 'emailcontacto'], 'safe'],
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
        $query = Empresa::find();

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
            'tipo' => $this->tipo,
            'estado' => $this->estado,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'razonSocial', $this->razonSocial])
            ->andFilterWhere(['like', 'nit', $this->nit])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'cod', $this->cod])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'paginaWeb', $this->paginaWeb])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'nombreContacto', $this->nombreContacto])
            ->andFilterWhere(['like', 'telefonoContacto', $this->telefonoContacto])
            ->andFilterWhere(['like', 'direccionContacto', $this->direccionContacto])
            ->andFilterWhere(['like', 'emailcontacto', $this->emailcontacto]);

        return $dataProvider;
    }
}
