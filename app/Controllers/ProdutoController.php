<?php
    namespace App\Controllers;

    use App\Services\ProdutoService;
    use App\Services\CategoriaService;
    use App\Views\Render;

    class ProdutoController {
        private ProdutoService $produtoService;
        private CategoriaService $categoriaService;

        public function __construct() {
            $this->produtoService = new ProdutoService();
            $this->categoriaService = new CategoriaService();
        }

        public function index(): string {
            $title = "Produtos";
            $produtos = $this->produtoService->list();
            return (new Render())->render('produtos/index', compact('title', 'produtos'));
        }

        public function criar(): string {
            $title = "Novo Produto";
            $categorias = $this->categoriaService->list();
            return (new Render())->render('produtos/criar', compact('title', 'categorias'));
        }

        public function create() {
            if (!empty($_POST['nome']) && !empty($_POST['categoria_id'])) {
                $this->produtoService->create($_POST['nome'], (int)$_POST['categoria_id']);
            }
            header('Location: /phpfaculdade/aula_php/aula7/produtos');
            exit;
        }

        public function editar(int $id): string {
            $title = "Editar Produto";
            $produto = $this->produtoService->findById($id);
            $categorias = $this->categoriaService->list(null);
            return (new Render())->render('produtos/editar', compact('title', 'produto', 'categorias'));
        }

        public function update() {
            if (!empty($_POST['id']) && !empty($_POST['nome']) && !empty($_POST['categoria_id'])) {
                $this->produtoService->update((int)$_POST['id'], $_POST['nome'], (int)$_POST['categoria_id']);
            }
            header('Location: /phpfaculdade/aula_php/aula7/produtos');
            exit;
        }


        public function delete() {
            if (!empty($_POST['id'])) {
                $this->produtoService->delete((int)$_POST['id']);
            }
            header('Location: /phpfaculdade/aula_php/aula7/produtos');
            exit;
        }
        
    }
?>