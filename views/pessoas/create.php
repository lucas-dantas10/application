<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
?>

<div>
    <h1 class="mb-3">Adicionar pessoa</h1>

    <?php $form = ActiveForm::begin(['action' => ['pessoas/store'], 'method' => 'post']); ?>

    <?= $form->field($model, 'nome')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>