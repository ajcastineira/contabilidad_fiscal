<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\docificacion\models\Docificacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="docificacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idEmpresa')->textInput() ?>

    <?= $form->field($model, 'nroOrden')->textInput() ?>

    <?= $form->field($model, 'fechaVencimiento')->textInput() ?>

    <?= $form->field($model, 'estado')->checkbox() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
