<?php

namespace backend\modules\empresa\models;

use Yii;

/**
 * This is the model class for table "sucursal".
 *
 * @property integer $id
 * @property integer $idEmpresa
 * @property string $nombre
 * @property string $direccion
 * @property string $telefono
 * @property boolean $central
 * @property boolean $estado
 *
 * @property Asiento[] $asientos
 * @property Compra[] $compras
 * @property Empresa $idEmpresa0
 * @property Venta[] $ventas
 */
class Sucursal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sucursal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idEmpresa'], 'required'],
            [['idEmpresa'], 'integer'],
            [['central', 'estado'], 'boolean'],
            [['nombre', 'direccion', 'telefono'], 'string', 'max' => 250],
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
            'nombre' => 'Nombre',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'central' => 'Central',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsientos()
    {
        return $this->hasMany(Asiento::className(), ['idSucursal' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompras()
    {
        return $this->hasMany(Compra::className(), ['idSucursal' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpresa0()
    {
        return $this->hasOne(Empresa::className(), ['id' => 'idEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Venta::className(), ['idSucursal' => 'id']);
    }
}
