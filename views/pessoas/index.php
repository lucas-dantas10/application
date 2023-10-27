<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1>Pessoas</h1>
<ul>
<?php foreach ($peoples as $people): ?>
    <li>
        <?= Html::encode("{$people->id} ({$people->nome})") ?>:
        <?= $people->nome ?>
    </li>
<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>