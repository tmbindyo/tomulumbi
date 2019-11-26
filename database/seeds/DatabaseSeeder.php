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
        $this->call([CategoryTableSeeder::class]);
        $this->call([ColorTableSeeder::class]);
        $this->call([ContactTypeTableSeeder::class]);
        $this->call([ContentAlignTableSeeder::class]);
        $this->call([CoverDesignTableSeeder::class]);
        $this->call([DownloadResolutionTableSeeder::class]);
        $this->call([ImagePositionTableSeeder::class]);
        $this->call([LabelTableSeeder::class]);
        $this->call([OrientationTableSeeder::class]);
        $this->call([ProjectTypeTableSeeder::class]);
        $this->call([SchemeTableSeeder::class]);
        $this->call([SizeTableSeeder::class]);
        $this->call([StatusTableSeeder::class]);
        $this->call([StatusTypeTableSeeder::class]);
        $this->call([SubTypeTableSeeder::class]);
        $this->call([TagTableSeeder::class]);
        $this->call([ThumbnailSizeTableSeeder::class]);
        $this->call([TypeTableSeeder::class]);
        $this->call([UploadTypeTableSeeder::class]);
        $this->call([UserTableSeeder::class]);
        $this->call([UserTypeTableSeeder::class]);
        $this->call([ViewTypeTableSeeder::class]);
    }
}
