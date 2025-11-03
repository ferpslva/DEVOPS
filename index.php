<?php
// chamando o arquivo config do composer
require_once __DIR__ . '/vendor/autoload.php';

// chamando as classes de controllers
use App\Controllers\CategoriaController;
use App\Controllers\ProdutoController;


// variavel basedir
$basedir = "/phpfaculdade/aula_php/aula7";

// pega URL crua (sem tratamento)
$uri = $_SERVER["REQUEST_URI"] ?? "/";

// tratamento QUERY STRING (ex: ?parametro=valor)
$uri = strtok($uri, "?");

// remove o prefixo /phpfaculdade/aula_php/aula7 da frente da uri
if (str_starts_with($uri, $basedir)) {
    // remover a string da uri
    $uri = substr($uri, strlen($basedir));
}

// remover a barra final
$uri = rtrim($uri, '/');

// pegar o método da requisição
$metodo = $_SERVER['REQUEST_METHOD'];

// criação das rotas de views
if ($metodo == 'GET') {
    // Rotas de Categorias
    if ($uri === '/categorias') {
        echo (new CategoriaController())->index();
        exit;
    }
    if ($uri === '/categorias/criar') {
        echo (new CategoriaController())->criar();
        exit;
    }
    if ($uri === '/categorias/ver') {
        $id = (int)($_GET['id'] ?? 0);
        echo (new CategoriaController())->ver($id);
        exit;
    }
    if ($uri === '/categorias/editar') {
        $id = (int)($_GET['id'] ?? 0);
        if ($id > 0) {
            echo (new CategoriaController())->editar($id);
        } else {
            echo "ID da categoria não informado!";
        }
    exit;
    }

    // Rotas de Produtos
    if ($uri === '/produtos') {
        echo (new ProdutoController())->index();
        exit;
    }
    if ($uri === '/produtos/criar') {
        echo (new ProdutoController())->criar();
        exit;
    }
    if ($uri === '/produtos/exibir') {
        $id = (int)($_GET['id'] ?? 0);
        echo (new ProdutoController())->exibir($id);
        exit;
    }
    if ($uri === '/produtos/editar') {
        $id = (int)($_GET['id'] ?? 0);
        if ($id > 0) {
            echo (new ProdutoController())->editar($id);
        } else {
            echo "ID do produto não informado!";
        }
        exit;
    }
    
}

// criação das rotas de APIs
// API de Categorias
if ($uri === '/api/categorias' && $metodo == 'GET') {
    echo (new CategoriaController())->list();
    exit;
}
if ($uri === '/api/categorias' && $metodo == 'POST') {
    (new CategoriaController())->create();
    header('Location: /phpfaculdade/aula_php/aula7/categorias');
    exit;

}
if ($uri === '/categorias/update' && $metodo == 'POST') {
    (new CategoriaController())->update();
    exit;
}
if ($uri === '/api/categorias/deletar' && $metodo == 'POST') {
    $id = (int)($_POST['id']);
    (new CategoriaController())->delete();
    header('Location: /phpfaculdade/aula_php/aula7/categorias');
    exit;

}

// API de Produtos
if ($uri === '/api/produtos' && $metodo == 'GET') {
    echo (new ProdutoController())->list();
    exit;
}
if ($uri === '/api/produtos' && $metodo == 'POST') {
    (new ProdutoController())->create();
    header('Location: /phpfaculdade/aula_php/aula7/produtos');
    exit;
    
}
if ($uri === '/produtos/update' && $metodo == 'POST') {
    (new ProdutoController())->update();
    exit;
}
if ($uri === '/api/produtos/deletar' && $metodo == 'POST') {
    $id = (int)($_POST['id']);
    (new ProdutoController())->delete();
    header('Location: /phpfaculdade/aula_php/aula7/produtos');
    exit;

}

