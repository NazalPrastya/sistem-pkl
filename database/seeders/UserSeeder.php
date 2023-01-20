<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=> 'Nazal Gusti Prastya',
            'major_id' => 1,
            'jurusan' => 'Pengembangan Perangkat Lunak dan Game',
            'status'=>'Diterima',
            'kelas'=>'XI PPLG 2',
            'jenis_kelamin' => 'Laki-laki',
            'NIS'=> 12345678,
            'agama' => 'islam',
            'alamat'=> 'Ciomas',
            'whatsapp'=> '089516439498',
            'email'=>'nazal@gmail.com',
            'password'=>bcrypt('password'),
            'company_id' => 1
        ]);
        User::create([
            'name'=> 'Ahmad Faliansyah',
            'major_id' => 1,
            'jurusan' => 'Pengembangan Perangkat Lunak dan Game',
            'status'=>'Belum',
            'kelas' => 'XI PPLG 2',
            'jenis_kelamin' => 'Laki-laki',
            'NIS'=> 12345678,
            'agama' => 'islam',
            'alamat'=> 'Ciomas',
            'whatsapp' => '08923742912', 
            'email'=>'ahmad@gmail.com',
            'password'=>bcrypt('password'),
            'company_id' => 1

        ]);
        User::create([
            'name'=> 'Iqbal Bayhaqi F',
            'major_id' => 1,
            'jurusan' => 'Pengembangan Perangkat Lunak dan Game',
            'status'=>'Belum',
            'kelas'=>'XI PPLG 2',
            'jenis_kelamin' => 'Laki-laki',
            'NIS'=> 12345678,
            'agama' => 'islam',
            'alamat'=> 'Ciomas',
            'whatsapp' => '08923742912', 
            'email'=>'iqbal@gmail.com',
            'password'=>bcrypt('password'),
            'company_id' => 1

        ]);
    }
}
