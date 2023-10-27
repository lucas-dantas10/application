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


    <!-- <form>
        <div class="mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="email" class="form-control" id="name" aria-describedby="name">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form> -->
</div>