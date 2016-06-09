<?php

namespace backend\modules\asiento\models;

use Yii;
use backend\modules\planCuentas\models\Cuenta;

/**
 * This is the model class for table "detalle_asiento".
 *
 * @property integer $idAsiento
 * @property integer $idCuenta
 * @property double $debe
 * @property double $haber
 * @property integer $orden
 *
 * @property Asiento $idAsiento0
 * @property Cuenta $idCuenta0
 */
class DetalleAsiento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detalle_asiento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idAsiento', 'idCuenta'], 'required'],
            [['idAsiento', 'idCuenta', 'orden'], 'integer'],
            [['debe', 'haber'], 'number'],
            [['idAsiento'], 'exist', 'skipOnError' => true, 'targetClass' => Asiento::className(), 'targetAttribute' => ['idAsiento' => 'id']],
            [['idCuenta'], 'exist', 'skipOnError' => true, 'targetClass' => Cuenta::className(), 'targetAttribute' => ['idCuenta' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idAsiento' => 'Id Asiento',
            'idCuenta' => 'Id Cuenta',
            'debe' => 'Debe',
            'haber' => 'Haber',
            'orden' => 'Orden',
        ];
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
    public function getIdCuenta0()
    {
        return $this->hasOne(Cuenta::className(), ['id' => 'idCuenta']);
    }
}
