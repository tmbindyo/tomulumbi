<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([AlbumTypeTableSeeder::class]);
        $this->call([ColorTableSeeder::class]);
        $this->call([CoverDesignTableSeeder::class]);
        $this->call([DownloadResolutionTableSeeder::class]);
        $this->call([GridSpacingTableSeeder::class]);
        $this->call([GridStyleTableSeeder::class]);
        $this->call([ProjectTypeTableSeeder::class]);
        $this->call([StatusTableSeeder::class]);
        $this->call([ThumbnailSizeTableSeeder::class]);
        $this->call([UserTableSeeder::class]);
        $this->call([UserTypeTableSeeder::class]);
    }
}
