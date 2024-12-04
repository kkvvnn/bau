<?php

namespace App\Console\Commands\Artcenter;

use App\Models\Artcenter;
use App\Models\ArtCentreNew;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ArtcenterImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'artcenter:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artcenter Import';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info('Artcenter [START...]');

        $bar = $this->output->createProgressBar(1);

        ArtCentreNew::truncate();
        $url = 'https://rdp.tpv.one/files/msk2474/Msk2474%20(XLSX).xlsx';
        $contents = file_get_contents($url);

        $date = date('Y-m-d_His');
        $name = 'import/artcenter/original/artcenter_'.$date.'.xlsx';

        Storage::put($name, $contents);

        $name = base_path() . '/storage/app/' . $name;

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($name);

        $spreadsheet->getActiveSheet()->removeRow(1, 2);
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save(base_path() . '/storage/app/import/artcenter/artcenter_'.$date.'.xlsx');

        $name = 'import/artcenter/artcenter_'.$date.'.xlsx';

        Excel::import(new \App\Imports\ArtcenterImport(), $name);

        $bar->finish();
        $this->info(' ----- Artcenter Import to database! [OK]');

//        $this->call('up');
        $this->call('artcenter:download-images');

        $this->info('Artcenter [READY...OK]');
    }
}
