<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\empresa\models\Empresa */
?>
<div class="empresa-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            'razonSocial',
            'nit',
            'direccion',
            'tipo',
            'cod',
            'telefono',
            'paginaWeb',
            'email:email',
            'observaciones',
            'logo',
            'estado:boolean',
            'nombreContacto',
            'telefonoContacto',
            'direccionContacto',
            'emailcontacto:email',
        ],
    ]) ?>

</div>
