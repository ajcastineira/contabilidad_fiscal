<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\gestion\models\Gestion */
?>
<div class="gestion-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'idEmpresa',
            'fechaInicio',
            'fechafin',
            'cerrado:boolean',
            'descripcion',
        ],
    ]) ?>

</div>
