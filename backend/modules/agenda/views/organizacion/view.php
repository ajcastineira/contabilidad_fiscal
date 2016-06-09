<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\agenda\models\Organizacion */
?>
<div class="organizacion-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombreRazonSocial',
            'paginaWeb',
            'tipoEmpresa',
        ],
    ]) ?>

</div>
