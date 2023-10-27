<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

<div>
    <h1 class="mb-3">Editar <?= $people->nome ?></h1>

    <form>
        <div class="mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
</div>