<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['judul' => 'How to Breathe', 'penerbit' => 'Gramedia', 'pengarang' => 'Suurhoen', 'stok_buku' => '20']
        ];
        foreach($data as $val){
            Buku::insert([
                'judul' => $val['judul'],
                'penerbit' => $val['pengarang'],
                'pengarang' => $val['pengarang'],
                'stok_buku' => $val['stok_buku']
            ]);
        }
    }
}
