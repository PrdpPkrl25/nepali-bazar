<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run()
    {
        DB ::statement('SET FOREIGN_KEY_CHECKS = 0');
        $this -> call(
            [
                ProvinceSeeder::class,
                DistrictSeeder::class,
                MunicipalSeeder::class,
                PermissionSeeder::class,
                CategorySeeder::class,
                WardSeeder::class,
                UserSeeder::class,
                ShopSeeder::class,
            ]
        );
        DB ::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
