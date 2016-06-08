<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\parametros\models\TipoCambio */
?>
<div class="tipo-cambio-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'monto',
            'fecha',
            'vigente:boolean',
        ],
    ]) ?>

</div>
