<?php

namespace backend\modules\asiento\models;

use Yii;
use backend\modules\empresa\models\Empresa;
/**
 * This is the model class for table "tipo_asiento".
 *
 * @property integer $id
 * @property string $descripcion
 * @property integer $nroDocumento
 * @property boolean $estado
 * @property integer $idEmpresa
 *
 * @property Asiento[] $asientos
 * @property Empresa $idEmpresa0
 */
class TipoAsiento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_asiento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nroDocumento', 'idEmpresa'], 'integer'],
            [['estado'], 'boolean'],
            [['idEmpresa'], 'required'],
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
            'descripcion' => 'Descripcion',
            'nroDocumento' => 'Nro Documento',
            'estado' => 'Estado',
            'idEmpresa' => 'Id Empresa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsientos()
    {
        return $this->hasMany(Asiento::className(), ['idTipoAsiento' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpresa0()
    {
        return $this->hasOne(Empresa::className(), ['id' => 'idEmpresa']);
    }
}
