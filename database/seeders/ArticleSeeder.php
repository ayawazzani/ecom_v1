<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;   

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::create([
            'titre' => 'Sac de randonnée',
            'contenu' => 'Sac résistant à l’eau idéal pour la randonnée et le camping',
            'image' => 'https://via.placeholder.com/300'
        ]);
    }
}
