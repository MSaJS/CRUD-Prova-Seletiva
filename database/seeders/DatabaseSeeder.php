<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Criando categorias e armazenando os IDs
        $categories = [
            'Eletrônicos' => Category::create(['nome' => 'Eletrônicos', 'descricao' => 'Dispositivos e acessórios eletrônicos.']),
            'Vestuário' => Category::create(['nome' => 'Vestuário', 'descricao' => 'Roupas, calçados e acessórios.']),
            'Alimentos' => Category::create(['nome' => 'Alimentos', 'descricao' => 'Comida e bebidas diversas.']),
        ];

        // Criando produtos com os IDs corretos das categorias
        $products = [
            ['nome' => 'Smartphone', 'descricao' => 'Celular com tela de 6.5 polegadas', 'preco' => 2500.00, 'quantidade' => 10, 'category_id' => $categories['Eletrônicos']->id],
            ['nome' => 'Notebook', 'descricao' => 'Laptop com 16GB de RAM e SSD de 512GB', 'preco' => 4800.00, 'quantidade' => 5, 'category_id' => $categories['Eletrônicos']->id],
            ['nome' => 'Camiseta', 'descricao' => 'Camiseta 100% algodão', 'preco' => 50.00, 'quantidade' => 30, 'category_id' => $categories['Vestuário']->id],
            ['nome' => 'Tênis Esportivo', 'descricao' => 'Tênis confortável para corrida', 'preco' => 250.00, 'quantidade' => 20, 'category_id' => $categories['Vestuário']->id],
            ['nome' => 'Chocolate', 'descricao' => 'Chocolate amargo 70%', 'preco' => 10.00, 'quantidade' => 50, 'category_id' => $categories['Alimentos']->id],
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}
