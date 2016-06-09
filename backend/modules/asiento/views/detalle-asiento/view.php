<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\asiento\models\DetalleAsiento */
?>
<div class="detalle-asiento-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idAsiento',
            'idCuenta',
            'debe',
            'haber',
            'orden',
        ],
    ]) ?>

</div>
