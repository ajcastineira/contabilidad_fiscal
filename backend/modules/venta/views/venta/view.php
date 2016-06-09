<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\venta\models\Venta */
?>
<div class="venta-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'idAgenda',
            'idAsiento',
            'idSucursal',
            'nroFactura',
            'nroAutorizacion',
            'impTotal',
            'estadoFactura:boolean',
            'codControl',
            'tipoCambio',
            'uvf',
            'fechaRegistroSistema',
            'importeICE',
            'fecha',
            'importeExentos',
            'eliminado:boolean',
            'conAsientoModelo:boolean',
        ],
    ]) ?>

</div>
