<?php
namespace Shahadatzcpe\BDLocation;

use Illuminate\Console\Command;

class ImportData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:bdlocation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import bangladesh locations.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $files = [
            'bdlocation_divisions.sql',
            'bdlocation_districts.sql',
            'bdlocation_upazilas.sql',
            'bdlocation_police_stations.sql',
            'bdlocation_unions.sql',
        ];
        foreach($files as $file) {
            $path = __DIR__ . DIRECTORY_SEPARATOR . 'sql' . DIRECTORY_SEPARATOR . $file;
            $this->warn("Running raw script from: $file");
            $sql = file_get_contents($path);
            if(!trim($sql)) {
                $this->warn("No content found in: $file");
                continue;
            }
            \DB::insert(\DB::raw($sql));
            $this->info("Successfully executed raw script from: $file");
        }
    }
}
