<?php

namespace backend\modules\parametros\models;

use Yii;

/**
 * This is the model class for table "ufv".
 *
 * @property integer $id
 * @property double $monto
 * @property string $fecha
 * @property boolean $vigente
 */
class Ufv extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ufv';
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
