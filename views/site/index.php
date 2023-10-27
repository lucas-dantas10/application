<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->registerJsFile(
    '@web/js/actions.js',
    ['depends' => [\yii\web\JqueryAsset::class]]
);
?>

<div class="d-flex flex-column gap-4">

    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Pessoas</h1>
        </div>

        <div>
            <a href="http://localhost:8000/index.php?r=pessoas/create" class="btn btn-primary">
                Add Pessoa
            </a>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Pessoa</th>
                <th scope="col">Atributos</th>
                <th scope="col">Editar</th>
                <th scope="col">Deletar</th>
            </tr>
        </thead>
        <tbody class="table-body">
            <!-- carregado via javascript -->
        </tbody>
    </table>

    <nav aria-label="Page navigation example" class="d-flex justify-content-between align-items-center">
        <div class="showing-count-line">
            <!-- carregado via javascript -->
        </div>

        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" id="prev-page" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" id="next-page" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>