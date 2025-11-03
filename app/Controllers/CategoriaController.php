<?php
    namespace App\Controllers;

    use App\Services\CategoriaService;
    use App\Views\Render;

    class CategoriaController {
        private CategoriaService $service;

        public function __construct() {
            $this->service = new CategoriaService();
        }

        public function index(): string {
            $title = "Categorias";
            $categorias = $this->service->list();
            return (new Render())->render('categorias/index', compact('title', 'categorias'));
        }

        public function criar(): string {
            $title = "Criar Nova Categoria";
            return (new Render())->render('categorias/criar', compact('title'));
        }

        public function create() {
            if (!empty($_POST['nome'])) {
                $this->service->create($_POST['nome']);
            }
            header('Location: /phpfaculdade/aula_php/aula7/categorias');
            exit;
        }

        public function editar(int $id): string {
            $title = "Editar Categoria";
            $categoria = $this->service->findById($id);
            return (new Render())->render('categorias/editar', compact('title', 'categoria'));
        }

        public function update() {
            if (!empty($_POST['id']) && !empty($_POST['nome'])) {
                $this->service->update((int)$_POST['id'], $_POST['nome']);
            }
            header('Location: /phpfaculdade/aula_php/aula7/categorias');
            exit;
        }


        public function delete() {
            if (!empty($_POST['id'])) {
                $this->service->delete((int)$_POST['id']);
            }
            header('Location: /phpfaculdade/aula_php/aula7/categorias');
            exit;
        }
        
    }

?>