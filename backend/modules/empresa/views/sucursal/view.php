<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\empresa\models\Sucursal */
?>
<div class="sucursal-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'idEmpresa',
            'nombre',
            'direccion',
            'telefono',
            'central:boolean',
            'estado:boolean',
        ],
    ]) ?>

</div>
