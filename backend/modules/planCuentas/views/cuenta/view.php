<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\planCuentas\models\Cuenta */
?>
<div class="cuenta-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'idPlandeCuentas',
            'idcuentaPadre',
            'codigo',
            'descripcion',
            'ordenCuenta',
            'tipo',
            'tipoCuenta',
        ],
    ]) ?>

</div>
