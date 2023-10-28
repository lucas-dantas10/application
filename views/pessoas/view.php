<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

<div>
    <h1 class="mb-3">Editar <?= $people->nome ?></h1>

    <?php $form = ActiveForm::begin(['action' => ['pessoas/update'], 'method' => 'post']); ?>

    <?= $form->field($model, 'nome')->textInput() ?>

    <input type="hidden" name="id" value="<?= $people->id ?>">

    <div class="form-group">
        <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>