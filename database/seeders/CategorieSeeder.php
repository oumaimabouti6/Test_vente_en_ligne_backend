<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    
        {
            $categorie = new Categorie();
            $categorie->name = 'Categorie1';
            $categorie->save();
    
            $categorie = new Categorie();
            $categorie->name = 'Categorie2';
            $categorie->save();
    
            $categorie = new Categorie();
            $categorie->name = 'Categorie3';
            $categorie->save();

            $categorie = new Categorie();
            $categorie->name = 'Categorie4';
            $categorie->save();
        }
    
}
