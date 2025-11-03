<div>
    <?php if(!$produto): ?>
        <p>Produto não encontrado.</p>
    <?php else: ?>
        <h2>Produto #<?= $produto['id'] ?></h2>
        <p>Nome: <?= $produto['nome'] ?></p>

        <p>Categoria: <?= $produto['categoria_nome'] ?></p>
    <?php endif; ?>
</div>
