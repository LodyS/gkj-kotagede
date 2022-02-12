<?php
use App\Gereja;
use Illuminate\Database\Seeder;
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;

class GerejaSeeder extends SpreadsheetSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info("Hapus Gereja");
        DB::table('gereja')->delete();
        $this->file = '/database/excel/gereja.xlsx';
        $this->tablename = 'gereja';
        $this->truncate = false;

        parent::run();
    }
}
