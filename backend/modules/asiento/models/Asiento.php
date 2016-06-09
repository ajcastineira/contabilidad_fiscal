<?php

namespace backend\modules\asiento\models;

use Yii;
use backend\modules\gestion\models\Gestion;
use backend\modules\empresa\models\Sucursal;

/**
 * This is the model class for table "asiento".
 *
 * @property integer $id
 * @property integer $idTipoAsiento
 * @property integer $idGestion
 * @property integer $idSucursal
 * @property string $fecha
 * @property string $glosa
 * @property double $ufv
 * @property string $fechaRegistroSistema
 * @property boolean $anulado
 * @property integer $nombreAsiento
 * @property double $tipoCambio
 * @property integer $nroDocumento
 *
 * @property TipoAsiento $idTipoAsiento0
 * @property Gestion $idGestion0
 * @property Sucursal $idSucursal0
 * @property Compra[] $compras
 * @property DetalleAsiento[] $detalleAsientos
 * @property Cuenta[] $idCuentas
 * @property Venta[] $ventas
 */
class Asiento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'asiento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idTipoAsiento', 'idGestion', 'idSucursal'], 'required'],
            [['idTipoAsiento', 'idGestion', 'idSucursal', 'nombreAsiento', 'nroDocumento'], 'integer'],
            [['fecha', 'fechaRegistroSistema'], 'safe'],
            [['ufv', 'tipoCambio'], 'number'],
            [['anulado'], 'boolean'],
            [['glosa'], 'string', 'max' => 255],
            [['idTipoAsiento'], 'exist', 'skipOnError' => true, 'targetClass' => TipoAsiento::className(), 'targetAttribute' => ['idTipoAsiento' => 'id']],
            [['idGestion'], 'exist', 'skipOnError' => true, 'targetClass' => Gestion::className(), 'targetAttribute' => ['idGestion' => 'id']],
            [['idSucursal'], 'exist', 'skipOnError' => true, 'targetClass' => Sucursal::className(), 'targetAttribute' => ['idSucursal' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idTipoAsiento' => 'Id Tipo Asiento',
            'idGestion' => 'Id Gestion',
            'idSucursal' => 'Id Sucursal',
            'fecha' => 'Fecha',
            'glosa' => 'Glosa',
            'ufv' => 'Ufv',
            'fechaRegistroSistema' => 'Fecha Registro Sistema',
            'anulado' => 'Anulado',
            'nombreAsiento' => 'Nombre Asiento',
            'tipoCambio' => 'Tipo Cambio',
            'nroDocumento' => 'Nro Documento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoAsiento0()
    {
        return $this->hasOne(TipoAsiento::className(), ['id' => 'idTipoAsiento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGestion0()
    {
        return $this->hasOne(Gestion::className(), ['id' => 'idGestion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSucursal0()
    {
        return $this->hasOne(Sucursal::className(), ['id' => 'idSucursal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompras()
    {
        return $this->hasMany(Compra::className(), ['idAsiento' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleAsientos()
    {
        return $this->hasMany(DetalleAsiento::className(), ['idAsiento' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCuentas()
    {
        return $this->hasMany(Cuenta::className(), ['id' => 'idCuenta'])->viaTable('detalle_asiento', ['idAsiento' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Venta::className(), ['idAsiento' => 'id']);
    }
}
