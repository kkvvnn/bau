<?php

namespace App\Console\Commands\Artkera;

use App\Models\Collection;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

class ArtkeraUnzip extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'artkera:unzip';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artkera unzip';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $arr_api = [
            'territory',
            'tovar',
            'price',
            'picture',
            'category',
            'balance',
        ];

        $bar = $this->output->createProgressBar(6);
        $bar->start();

        foreach ($arr_api as $value) {
            $this->my_unzip($value);
            $bar->advance();
        }

        $bar->finish();
        $this->info(' ----- Artkera unzip all [OK]');
    }

    function my_unzip($value): void
    {
        $url = "https://zakaz.altacera.ru/load/" . $value . "_json.zip";
        $contents = file_get_contents($url);

        $date = date("Y-m-d_His");
        $name_zip = 'import/altacera/' . $value . '_' . $date . '.zip';
        Storage::put($name_zip, $contents);

        $zip = new \ZipArchive;
        $res = $zip->open(Storage::path($name_zip));

        if ($res === true) {
            $files = Storage::files('import/altacera/' . $value . '/');
            Storage::delete($files);

            $zip->extractTo(Storage::path('import/altacera/' . $value . '/'));
            $zip->close();

            $files = Storage::files('import/altacera/' . $value . '/');

            Storage::move($files[0], 'import/altacera/' . $value . '/' . $value . '.json');
            echo 'ok ';
        } else {
            echo 'failed';
        }
    }

}
