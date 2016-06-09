<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\compra\models\Compra */
?>
<div class="compra-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'idAgenda',
            'idAsiento',
            'idSucursal',
            'nroFactura',
            'nroPoliza',
            'nroAutorizacion',
            'impFactura',
            'codControl',
            'tipoCambio',
            'ufv',
            'fechaRegistroSistema',
            'importeICE',
            'fecha',
            'importeExentos',
            'eliminado:boolean',
            'tipoCompra',
            'conAsientoModelo:boolean',
        ],
    ]) ?>

</div>
