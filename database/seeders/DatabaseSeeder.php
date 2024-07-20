<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Konser;
use App\Models\Riwayat;
use App\Models\Tiket;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory()->create([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('admin123'),
        //     'group' => 'admin',
        // ]);
        // User::factory()->create([
        //     'name' => 'ine',
        //     'email' => 'ine@gmail.com',
        //     'password' => Hash::make('ine12345'),
        //     'group' => 'user',
        // ]);
        // User::factory()->create([
        //     'name' => 'rijal',
        //     'email' => 'rijal@gmail.com',
        //     'password' => Hash::make('rijal12345'),
        //     'group' => 'user',
        // ]);
        // User::factory()->count(10)->create();
        // $konsers = Konser::factory()->count(5)->create();
        // foreach ($konsers as $konser) {
        //     Tiket::factory()->create([
        //         'konser_id' => $konser->id,
        //         'category' => 'Gold',
        //         'price' => 100,
        //         'quantity' => 50,
        //     ]);

        //     Tiket::factory()->create([
        //         'konser_id' => $konser->id,
        //         'category' => 'Silver',
        //         'price' => 75,
        //         'quantity' => 100,
        //     ]);

        //     Tiket::factory()->create([
        //         'konser_id' => $konser->id,
        //         'category' => 'Bronze',
        //         'price' => 50,
        //         'quantity' => 200,
        //     ]);
        // }
        // Transaksi::factory()->count(3)->create();
        Riwayat::factory()->count(3)->create();
    }
}
