<?php

namespace frontend\modules\empresa\models;

use Yii;

/**
 * This is the model class for table "empresa".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $razonSocial
 * @property string $nit
 * @property string $direccion
 * @property integer $tipo
 * @property string $cod
 * @property string $telefono
 * @property string $paginaWeb
 * @property string $email
 * @property string $observaciones
 * @property resource $logo
 * @property boolean $estado
 * @property string $nombreContacto
 * @property string $telefonoContacto
 * @property string $direccionContacto
 * @property string $emailcontacto
 *
 * @property AgendaEmpresa[] $agendaEmpresas
 * @property Agenda[] $ids
 * @property AsientoModelo[] $asientoModelos
 * @property CuentasMarcadas[] $cuentasMarcadas
 * @property Docificacion[] $docificacions
 * @property Gestion[] $gestions
 * @property PlanDeCuentas[] $planDeCuentas
 * @property Sucursal[] $sucursals
 * @property TipoAsiento[] $tipoAsientos
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo'], 'integer'],
            [['logo'], 'string'],
            [['estado'], 'boolean'],
            [['nombre', 'razonSocial', 'direccion', 'paginaWeb', 'email', 'observaciones', 'nombreContacto', 'direccionContacto', 'emailcontacto'], 'string', 'max' => 250],
            [['nit', 'cod', 'telefono', 'telefonoContacto'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'razonSocial' => 'Razon Social',
            'nit' => 'Nit',
            'direccion' => 'Direccion',
            'tipo' => 'Tipo',
            'cod' => 'Cod',
            'telefono' => 'Telefono',
            'paginaWeb' => 'Pagina Web',
            'email' => 'Email',
            'observaciones' => 'Observaciones',
            'logo' => 'Logo',
            'estado' => 'Estado',
            'nombreContacto' => 'Nombre Contacto',
            'telefonoContacto' => 'Telefono Contacto',
            'direccionContacto' => 'Direccion Contacto',
            'emailcontacto' => 'Emailcontacto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgendaEmpresas()
    {
        return $this->hasMany(AgendaEmpresa::className(), ['idEmpresa' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIds()
    {
        return $this->hasMany(Agenda::className(), ['id' => 'id'])->viaTable('agenda_empresa', ['idEmpresa' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsientoModelos()
    {
        return $this->hasMany(AsientoModelo::className(), ['idEmpresa' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuentasMarcadas()
    {
        return $this->hasMany(CuentasMarcadas::className(), ['idEmpresa' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocificacions()
    {
        return $this->hasMany(Docificacion::className(), ['idEmpresa' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGestions()
    {
        return $this->hasMany(Gestion::className(), ['idEmpresa' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanDeCuentas()
    {
        return $this->hasMany(PlanDeCuentas::className(), ['idEmpresa' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSucursals()
    {
        return $this->hasMany(Sucursal::className(), ['idEmpresa' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoAsientos()
    {
        return $this->hasMany(TipoAsiento::className(), ['idEmpresa' => 'id']);
    }
}
