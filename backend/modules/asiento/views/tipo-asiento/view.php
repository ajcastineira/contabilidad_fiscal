<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\asiento\models\TipoAsiento */
?>
<div class="tipo-asiento-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'descripcion',
            'nroDocumento',
            'estado:boolean',
            'idEmpresa',
        ],
    ]) ?>

</div>
