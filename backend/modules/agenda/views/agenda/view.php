<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\agenda\models\Agenda */
?>
<div class="agenda-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nitCi',
            'direccion',
            'telefono',
            'email:email',
            'tipo',
            'estado:boolean',
        ],
    ]) ?>

</div>
