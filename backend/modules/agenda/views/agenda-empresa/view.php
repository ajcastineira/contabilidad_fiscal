<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\agenda\models\AgendaEmpresa */
?>
<div class="agenda-empresa-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idAgenda',
            'idEmpresa',
            'estado:boolean',
        ],
    ]) ?>

</div>
