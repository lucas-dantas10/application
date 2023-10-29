<?php

?>

<div>
    <h1>Deletar Atributo "<?= $attribute->nome ?>"</h1>

    <form>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-secondary">Tem certeza que deseja excluir?</label>
        </div>
        <a href="http://localhost:8000/index.php?r=atributos/delete&id=<?= $attribute->id ?>" class="btn btn-danger">
            Excluir
        </a>
    </form>
</div>