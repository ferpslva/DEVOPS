<p>Produtos</p>

<ul>
    <?php foreach($produtos as $item): ?>
        <li>
            <a href="/phpfaculdade/aula_php/aula7/produtos/exibir?id=<?= $item['id'] ?>">
                <?= $item['nome'] ?>
            </a>
            
            <a href="/phpfaculdade/aula_php/aula7/produtos/editar?id=<?= $item['id'] ?>">
                <button type="button">Editar</button>
            </a>

            <form 
            action="
                /phpfaculdade/aula_php/aula7/api/produtos/deletar
            " method="POST"
            >
                <input type="hidden" name="id" value="<?= $item['id'] ?>" />
                <button type="submit">Excluir</button>
            </form>
        </li>
    <?php endforeach; ?>
</ul>