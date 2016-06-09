<?php

namespace backend\modules\agenda\models;

use Yii;

/**
 * This is the model class for table "organizacion".
 *
 * @property integer $id
 * @property string $nombreRazonSocial
 * @property string $paginaWeb
 * @property integer $tipoEmpresa
 *
 * @property Agenda $id0
 */
class Organizacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organizacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipoEmpresa'], 'integer'],
            [['nombreRazonSocial', 'paginaWeb'], 'string', 'max' => 250],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Agenda::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombreRazonSocial' => 'Nombre Razon Social',
            'paginaWeb' => 'Pagina Web',
            'tipoEmpresa' => 'Tipo Empresa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Agenda::className(), ['id' => 'id']);
    }
}
