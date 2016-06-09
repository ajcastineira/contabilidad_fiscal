<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\venta\models\Venta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="venta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idAgenda')->textInput() ?>

    <?= $form->field($model, 'idAsiento')->textInput() ?>

    <?= $form->field($model, 'idSucursal')->textInput() ?>

    <?= $form->field($model, 'nroFactura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nroAutorizacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'impTotal')->textInput() ?>

    <?= $form->field($model, 'estadoFactura')->checkbox() ?>

    <?= $form->field($model, 'codControl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipoCambio')->textInput() ?>

    <?= $form->field($model, 'uvf')->textInput() ?>

    <?= $form->field($model, 'fechaRegistroSistema')->textInput() ?>

    <?= $form->field($model, 'importeICE')->textInput() ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'importeExentos')->textInput() ?>

    <?= $form->field($model, 'eliminado')->checkbox() ?>

    <?= $form->field($model, 'conAsientoModelo')->checkbox() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
