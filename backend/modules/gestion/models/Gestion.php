<?php

namespace backend\modules\gestion\models;

use Yii;
use backend\modules\empresa\models\Empresa;

/**
 * This is the model class for table "gestion".
 *
 * @property integer $id
 * @property integer $idEmpresa
 * @property string $fechaInicio
 * @property string $fechafin
 * @property boolean $cerrado
 * @property string $descripcion
 *
 * @property Asiento[] $asientos
 * @property BalanceCierre[] $balanceCierres
 * @property Formula[] $formulas
 * @property Formulacompuesta[] $formulacompuestas
 * @property Empresa $idEmpresa0
 */
class Gestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gestion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idEmpresa'], 'required'],
            [['idEmpresa'], 'integer'],
            [['fechaInicio', 'fechafin'], 'safe'],
            [['cerrado'], 'boolean'],
            [['descripcion'], 'string', 'max' => 250],
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
            'fechaInicio' => 'Fecha Inicio',
            'fechafin' => 'Fechafin',
            'cerrado' => 'Cerrado',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsientos()
    {
        return $this->hasMany(Asiento::className(), ['idGestion' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBalanceCierres()
    {
        return $this->hasMany(BalanceCierre::className(), ['idGestion' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormulas()
    {
        return $this->hasMany(Formula::className(), ['idGestion' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormulacompuestas()
    {
        return $this->hasMany(Formulacompuesta::className(), ['idGestion' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpresa0()
    {
        return $this->hasOne(Empresa::className(), ['id' => 'idEmpresa']);
    }
}
