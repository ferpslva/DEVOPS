<p>Categorias</p>

<ul>
    <?php foreach($categorias as $item): ?>
        
        <li>
            <a href="/phpfaculdade/aula_php/aula7/categorias/ver?id=<?= $item['id'] ?>">
                <?= $item['nome'] ?>
            </a>

            <a href="/phpfaculdade/aula_php/aula7/categorias/editar?id=<?= $item['id'] ?>">
                <button type="button">Editar</button>
            </a>

            <form 
            action="
                /phpfaculdade/aula_php/aula7/api/categorias/deletar
            " method="POST"
            >
                <input type="hidden" name="id" value="<?= $item['id'] ?>" />
                <button type="submit">Excluir</button>
            </form>
        </li>
    <?php endforeach; ?>
</ul>