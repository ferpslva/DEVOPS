<h1><?= htmlspecialchars($title) ?></h1>

<form action="/phpfaculdade/aula_php/aula7/categorias/update" method="post">
    <input type="hidden" name="id" value="<?= htmlspecialchars($categoria['id']) ?>">

    <div>
        <label for="nome">Nome da Categoria:</label><br>
        <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($categoria['nome']) ?>" required>
    </div>

    <br>

    <button type="submit">Salvar Alterações</button>
    <a href="/phpfaculdade/aula_php/aula7/categorias">Cancelar</a>
</form>
