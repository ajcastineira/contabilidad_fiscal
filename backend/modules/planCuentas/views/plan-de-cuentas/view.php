<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\planCuentas\models\PlanDeCuentas */
?>
<div class="plan-de-cuentas-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'idEmpresa',
            'cod',
            'descripcion',
            'estado:boolean',
        ],
    ]) ?>

</div>
