<h1><?= htmlspecialchars($title) ?></h1>

<form action="/phpfaculdade/aula_php/aula7/produtos/update" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($produto['id']) ?>">

    <div>
        <label for="nome">Nome do Produto:</label><br>
        <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($produto['nome']) ?>" required>
    </div>

    <div>
        <label for="categoria_id">Categoria:</label><br>
        <select name="categoria_id" id="categoria_id" required>
            <option value="">Selecione...</option>
            <?php foreach ($categorias as $cat): ?>
                <option 
                    value="<?= $cat['id'] ?>" 
                    <?= ($cat['id'] == $produto['categoria_id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($cat['nome']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <br>

    <button type="submit">Salvar Alterações</button>
    <a href="/phpfaculdade/aula_php/aula7/produtos">Cancelar</a>
</form>
