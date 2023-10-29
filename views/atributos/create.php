<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
?>

<div>
    <h1 class="mb-3">Adicionar Atributo</h1>

    <?php $form = ActiveForm::begin(['action' => ['atributos/store'], 'method' => 'post']); ?>

    <?= $form->field($model, 'nome')->textInput() ?>
    <?= $form->field($model, 'pessoa')->dropDownList(
        $peoples
        , ['prompt'=>'Selecione a Pessoa']) ?>

    <div class="form-group">
        <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>