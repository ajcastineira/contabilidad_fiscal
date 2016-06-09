<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\asiento\models\Asiento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asiento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idTipoAsiento')->textInput() ?>

    <?= $form->field($model, 'idGestion')->textInput() ?>

    <?= $form->field($model, 'idSucursal')->textInput() ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'glosa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ufv')->textInput() ?>

    <?= $form->field($model, 'fechaRegistroSistema')->textInput() ?>

    <?= $form->field($model, 'anulado')->checkbox() ?>

    <?= $form->field($model, 'nombreAsiento')->textInput() ?>

    <?= $form->field($model, 'tipoCambio')->textInput() ?>

    <?= $form->field($model, 'nroDocumento')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
