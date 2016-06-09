<?php

namespace backend\modules\agenda\models;

use Yii;
use backend\modules\empresa\Empresa;

/**
 * This is the model class for table "agenda_empresa".
 *
 * @property integer $idAgenda
 * @property integer $idEmpresa
 * @property boolean $estado
 *
 * @property Agenda $idAgenda0
 * @property Empresa $idEmpresa0
 */
class AgendaEmpresa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agenda_empresa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idAgenda', 'idEmpresa'], 'required'],
            [['idAgenda', 'idEmpresa'], 'integer'],
            [['estado'], 'boolean'],
            [['idAgenda'], 'exist', 'skipOnError' => true, 'targetClass' => Agenda::className(), 'targetAttribute' => ['idAgenda' => 'id']],
            [['idEmpresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['idEmpresa' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idAgenda' => 'Id Agenda',
            'idEmpresa' => 'Id Empresa',
            'estado' => 'Estado',
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
    public function getIdEmpresa0()
    {
        return $this->hasOne(Empresa::className(), ['id' => 'idEmpresa']);
    }
}
