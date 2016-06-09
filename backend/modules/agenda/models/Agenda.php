<?php

namespace backend\modules\agenda\models;

use Yii;

/**
 * This is the model class for table "agenda".
 *
 * @property integer $id
 * @property string $nitCi
 * @property string $direccion
 * @property string $telefono
 * @property string $email
 * @property integer $tipo
 * @property boolean $estado
 *
 * @property AgendaEmpresa[] $agendaEmpresas
 * @property Empresa[] $idEmpresas
 * @property Compra[] $compras
 * @property Organizacion $organizacion
 * @property Venta[] $ventas
 */
class Agenda extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agenda';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nitCi'], 'required'],
            [['tipo'], 'integer'],
            [['estado'], 'boolean'],
            [['nitCi', 'telefono'], 'string', 'max' => 255],
            [['direccion', 'email'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nitCi' => 'Nit Ci',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'email' => 'Email',
            'tipo' => 'Tipo',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgendaEmpresas()
    {
        return $this->hasMany(AgendaEmpresa::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpresas()
    {
        return $this->hasMany(Empresa::className(), ['id' => 'idEmpresa'])->viaTable('agenda_empresa', ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompras()
    {
        return $this->hasMany(Compra::className(), ['idAgenda' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizacion()
    {
        return $this->hasOne(Organizacion::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Venta::className(), ['idAgenda' => 'id']);
    }
}
