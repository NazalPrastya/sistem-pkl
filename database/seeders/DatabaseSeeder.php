<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Admin;
use App\Models\Major;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Major::create([
            'name_major'=>'Pengembangan Perangkat Lunak dan Game',
            'slug'=>'pengembangan-perangkat-lunak-dan-game'
        ]);

        Major::create([
            'name_major'=>'Animasi',
            'slug'=>'animasi'
        ]);
        Major::create([
            'name_major'=>'Broadcasting dan Perfilman',
            'slug'=>'broadcasting-dan-perfilman'
        ]);
        Major::create([
            'name_major'=>'Teknik Otomotif',
            'slug'=>'teknik-otomotif'
        ]);
        Major::create([
            'name_major'=>'Teknik Pengelasan dan Fertilasi Logam',
            'slug'=>'teknik-pengelasan-dan-fertilasi-logam'
        ]);

        // User::create([
        //     'name'=> 'Admin',
        //     'major_id'=>'1',
        //     ''
        //     'email'=>'admin@gmail.com',
        //     'password'=>bcrypt('password'),
        //     'role'=>'admin'
        // ]);
        // User::create([
        //     'name'=> 'User',
        //     'major_id'=>'1',
        //     'email'=>'user@gmail.com',
        //     'password'=>bcrypt('password'),
        //     'role'=>'user'
        // ]);

        // User::create([
        //     'name'=> 'Nazal Gusti Prastya',
        //     'major_id'=> 1 ,
        //     'kelas'=>'XI PPLG 2',
        //     'jenis_kelamin' => 'Laki-laki',
        //     'NIS'=> 12345678,
        //     'agama' => 'islam',
        //     'alamat'=> 'Ciomas',
        //     'no_hp' => 08923742911,
        //     'email'=>'nazal@gmail.com',
        //     'password'=>bcrypt('password')
        // ]);
        // User::create([
        //     'name'=> 'Ahmad Faliansya',
        //     'major_id' => 2,
        //     'kelas' => 'XI PPLG 2',
        //     'jenis_kelamin' => 'Laki-laki',
        //     'NIS'=> 12345678,
        //     'agama' => 'islam',
        //     'alamat'=> 'Ciomas',
        //     'no_hp' => 08923742912, 
        //     'email'=>'ahmad@gmail.com',
        //     'password'=>bcrypt('password')
        // ]);
        // User::create([
        //     'name'=> 'Iqbal Bayhaqi F',
        //     'major_id'=> 3,
        //     'kelas'=>'XI PPLG 2',
        //     'jenis_kelamin' => 'Laki-laki',
        //     'NIS'=> 12345678,
        //     'agama' => 'islam',
        //     'alamat'=> 'Ciomas',
        //     'no_hp' => 08923742912, 
        //     'email'=>'iqbal@gmail.com',
        //     'password'=>bcrypt('password')
        // ]);

        Admin::create([
            'nama_admin' => 'Nazal',
            'kode_admin' => '12',
            'email' => 'nazalprastya@gmail.com',
            'password' => bcrypt('nazal123')
        ]);
    }
}
