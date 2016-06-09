<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\asiento\models\DetalleAsiento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalle-asiento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idAsiento')->textInput() ?>

    <?= $form->field($model, 'idCuenta')->textInput() ?>

    <?= $form->field($model, 'debe')->textInput() ?>

    <?= $form->field($model, 'haber')->textInput() ?>

    <?= $form->field($model, 'orden')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
