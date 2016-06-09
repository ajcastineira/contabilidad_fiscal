<?php

namespace backend\modules\docificacion\models;

use Yii;
use backend\modules\empresa\models\Empresa;
/**
 * This is the model class for table "docificacion".
 *
 * @property integer $id
 * @property integer $idEmpresa
 * @property integer $nroOrden
 * @property string $fechaVencimiento
 * @property boolean $estado
 *
 * @property Empresa $idEmpresa0
 */
class Docificacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'docificacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idEmpresa'], 'required'],
            [['idEmpresa', 'nroOrden'], 'integer'],
            [['fechaVencimiento'], 'safe'],
            [['estado'], 'boolean'],
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
            'nroOrden' => 'Nro Orden',
            'fechaVencimiento' => 'Fecha Vencimiento',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpresa0()
    {
        return $this->hasOne(Empresa::className(), ['id' => 'idEmpresa']);
    }
}
