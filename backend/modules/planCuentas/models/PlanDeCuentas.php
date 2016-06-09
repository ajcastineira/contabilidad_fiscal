<?php

namespace backend\modules\planCuentas\models;

use Yii;
use backend\modules\empresa\models\Empresa;
/**
 * This is the model class for table "plan_de_cuentas".
 *
 * @property integer $id
 * @property integer $idEmpresa
 * @property string $cod
 * @property string $descripcion
 * @property boolean $estado
 *
 * @property Cuenta[] $cuentas
 * @property Empresa $idEmpresa0
 */
class PlanDeCuentas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plan_de_cuentas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idEmpresa'], 'required'],
            [['idEmpresa'], 'integer'],
            [['estado'], 'boolean'],
            [['cod', 'descripcion'], 'string', 'max' => 250],
            [['idEmpresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['idEmpresa' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idEmpresa' => 'Id Empresa',
            'cod' => 'Cod',
            'descripcion' => 'Descripcion',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuentas()
    {
        return $this->hasMany(Cuenta::className(), ['idPlandeCuentas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpresa0()
    {
        return $this->hasOne(Empresa::className(), ['id' => 'idEmpresa']);
    }
}
