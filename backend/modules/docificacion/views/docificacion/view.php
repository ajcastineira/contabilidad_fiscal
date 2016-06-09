<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\docificacion\models\Docificacion */
?>
<div class="docificacion-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'idEmpresa',
            'nroOrden',
            'fechaVencimiento',
            'estado:boolean',
        ],
    ]) ?>

</div>
