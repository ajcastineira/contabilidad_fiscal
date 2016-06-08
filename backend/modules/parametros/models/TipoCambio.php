<?php

namespace backend\modules\parametros\models;

use Yii;

/**
 * This is the model class for table "tipo_cambio".
 *
 * @property integer $id
 * @property double $monto
 * @property string $fecha
 * @property boolean $vigente
 */
class TipoCambio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_cambio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['monto'], 'number'],
            [['fecha'], 'safe'],
            [['vigente'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'monto' => 'Monto',
            'fecha' => 'Fecha',
            'vigente' => 'Vigente',
        ];
    }
}
