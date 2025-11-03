<p>Novo Produto</p>
<form method="POST" action="/phpfaculdade/aula_php/aula7/api/produtos">
    <label for="nome">Nome do Produto:</label>
    <input type="text" name="nome" id="nome" required />

    <label for="categoria_id">Categoria:</label>
    <select name="categoria_id" id="categoria_id" required>
        <option value="">Escolha uma categoria</option>
        <?php foreach ($categorias as $categoria): ?>
            <option value="<?= $categoria['id'] ?>"><?= $categoria['nome'] ?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Salvar</button>
</form>

<a href="/phpfaculdade/aula_php/aula7/api/produtos">Voltar</a>