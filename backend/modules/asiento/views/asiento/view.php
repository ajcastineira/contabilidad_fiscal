<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\asiento\models\Asiento */
?>
<div class="asiento-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'idTipoAsiento',
            'idGestion',
            'idSucursal',
            'fecha',
            'glosa',
            'ufv',
            'fechaRegistroSistema',
            'anulado:boolean',
            'nombreAsiento',
            'tipoCambio',
            'nroDocumento',
        ],
    ]) ?>

</div>
