<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\agenda\models\Organizacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="organizacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'nombreRazonSocial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paginaWeb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipoEmpresa')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
