<?php

namespace backend\modules\planCuentas\models;

use Yii;

/**
 * This is the model class for table "cuenta".
 *
 * @property integer $id
 * @property integer $idPlandeCuentas
 * @property integer $idCuentaPadre
 * @property string $codigo
 * @property string $descripcion
 * @property integer $ordenCuenta
 * @property integer $tipo
 * @property string $tipoCuenta
 *
 * @property PlanDeCuentas $idPlandeCuentas0
 * @property CuentasMarcadas[] $cuentasMarcadas
 * @property DetalleAsiento[] $detalleAsientos
 * @property Asiento[] $idAsientos
 * @property DetalleAsientoModelo[] $detalleAsientoModelos
 * @property AsientoModelo[] $idAsientoModelos
 * @property DetalleFormula[] $detalleFormulas
 * @property Formula[] $idFormulas
 */
class Cuenta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cuenta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPlandeCuentas'], 'required'],
            [['idPlandeCuentas', 'idCuentaPadre', 'ordenCuenta', 'tipo'], 'integer'],
            [['codigo', 'descripcion'], 'string', 'max' => 250],
            [['tipoCuenta'], 'string', 'max' => 50],
            [['idPlandeCuentas'], 'exist', 'skipOnError' => true, 'targetClass' => PlanDeCuentas::className(), 'targetAttribute' => ['idPlandeCuentas' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idPlandeCuentas' => 'Id Plande Cuentas',
            'idCuentaPadre' => 'Id Cuenta Padre',
            'codigo' => 'Codigo',
            'descripcion' => 'Descripcion',
            'ordenCuenta' => 'Orden Cuenta',
            'tipo' => 'Tipo',
            'tipoCuenta' => 'Tipo Cuenta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPlandeCuentas0()
    {
        return $this->hasOne(PlanDeCuentas::className(), ['id' => 'idPlandeCuentas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuentasMarcadas()
    {
        return $this->hasMany(CuentasMarcadas::className(), ['idCuenta' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleAsientos()
    {
        return $this->hasMany(DetalleAsiento::className(), ['idCuenta' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAsientos()
    {
        return $this->hasMany(Asiento::className(), ['id' => 'idAsiento'])->viaTable('detalle_asiento', ['idCuenta' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleAsientoModelos()
    {
        return $this->hasMany(DetalleAsientoModelo::className(), ['idCuenta' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAsientoModelos()
    {
        return $this->hasMany(AsientoModelo::className(), ['id' => 'idAsientoModelo'])->viaTable('detalle_asiento_modelo', ['idCuenta' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleFormulas()
    {
        return $this->hasMany(DetalleFormula::className(), ['idCuenta' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFormulas()
    {
        return $this->hasMany(Formula::className(), ['id' => 'idFormula'])->viaTable('detalle_formula', ['idCuenta' => 'id']);
    }
}
