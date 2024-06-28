<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create($this->data);
    }

    private $data = [
        [
            "name" => "Jane",
            "email" => "jane@qq.com",
            "password" => "password"
        ]
    ];
}
