<?php

namespace backend\modules\compra\models;

use Yii;
use backend\modules\agenda\models\Agenda;
use backend\modules\asiento\models\Asiento;
use backend\modules\empresa\models\Sucursal;
/**
 * This is the model class for table "compra".
 *
 * @property integer $id
 * @property integer $idAgenda
 * @property integer $idAsiento
 * @property integer $idSucursal
 * @property string $nroFactura
 * @property string $nroPoliza
 * @property string $nroAutorizacion
 * @property double $impFactura
 * @property string $codControl
 * @property double $tipoCambio
 * @property double $ufv
 * @property string $fechaRegistroSistema
 * @property double $importeICE
 * @property string $fecha
 * @property double $importeExentos
 * @property boolean $eliminado
 * @property integer $tipoCompra
 * @property boolean $conAsientoModelo
 *
 * @property Agenda $idAgenda0
 * @property Asiento $idAsiento0
 * @property Sucursal $idSucursal0
 */
class Compra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'compra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idAgenda', 'idAsiento', 'idSucursal'], 'required'],
            [['idAgenda', 'idAsiento', 'idSucursal', 'tipoCompra'], 'integer'],
            [['impFactura', 'tipoCambio', 'ufv', 'importeICE', 'importeExentos'], 'number'],
            [['fechaRegistroSistema', 'fecha'], 'safe'],
            [['eliminado', 'conAsientoModelo'], 'boolean'],
            [['nroFactura', 'nroPoliza', 'nroAutorizacion', 'codControl'], 'string', 'max' => 255],
            [['idAgenda'], 'exist', 'skipOnError' => true, 'targetClass' => Agenda::className(), 'targetAttribute' => ['idAgenda' => 'id']],
            [['idAsiento'], 'exist', 'skipOnError' => true, 'targetClass' => Asiento::className(), 'targetAttribute' => ['idAsiento' => 'id']],
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
            'idAgenda' => 'Id Agenda',
            'idAsiento' => 'Id Asiento',
            'idSucursal' => 'Id Sucursal',
            'nroFactura' => 'Nro Factura',
            'nroPoliza' => 'Nro Poliza',
            'nroAutorizacion' => 'Nro Autorizacion',
            'impFactura' => 'Imp Factura',
            'codControl' => 'Cod Control',
            'tipoCambio' => 'Tipo Cambio',
            'ufv' => 'Ufv',
            'fechaRegistroSistema' => 'Fecha Registro Sistema',
            'importeICE' => 'Importe Ice',
            'fecha' => 'Fecha',
            'importeExentos' => 'Importe Exentos',
            'eliminado' => 'Eliminado',
            'tipoCompra' => 'Tipo Compra',
            'conAsientoModelo' => 'Con Asiento Modelo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAgenda0()
    {
        return $this->hasOne(Agenda::className(), ['id' => 'idAgenda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAsiento0()
    {
        return $this->hasOne(Asiento::className(), ['id' => 'idAsiento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSucursal0()
    {
        return $this->hasOne(Sucursal::className(), ['id' => 'idSucursal']);
    }
}
