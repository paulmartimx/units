<?php

namespace Units\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Composer;
use ZipArchive;

class UnitGet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'unit:get {units*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Descarga de Units desde Endpoint remoto';

    protected $endpoint;
    
    protected $composer;


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Composer $composer)
    {
        parent::__construct();
        
        $this->composer = $composer;
        $this->endpoint = env('UNITS_ENDPOINT');
        
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        if(empty($this->endpoint))
            return $this->error("[ERROR]: No se ha especificado ningún EndPoint en el archivo de entorno (.env)");

        $units = $this->argument('units');

        $this->info("Recuperando Units desde {$this->endpoint}");

        $contextOptions = array(
            "ssl" => array(
                "verify_peer"      => false,
                "verify_peer_name" => false,
            ),
        );

        $query = "?" . http_build_query(["units" => $units]);
        $copy_result = copy($this->endpoint . $query, base_path('Units.zip'), stream_context_create($contextOptions));

        if(!$copy_result)
            return $this->error('No se pudo descargar el archivo.');

        $this->info("Descomprimiendo ZIP...");

        $zip = new ZipArchive;
        $res = $zip->open(base_path('Units.zip'));

        if ($res === TRUE) {
            $zip->extractTo(base_path());
            $zip->close();
            $this->info("El ZIP se descomprimió correctamente");

            if(file_exists(base_path('Units.zip')))
                unlink(base_path('Units.zip'));
            
            $this->info("Re-generando autoloads de Composer");
            $this->composer->dumpAutoloads();


            $this->error("**Importante**");
            $this->error("Corra los comandos:");
            $this->warn("php artisan unit:composer && php artisan unit:publish && php artisan migrate");
            

        } else {
          return $this->error('No se pudo descomprimir el archivo automáticamente.');
        }
        
    }
}





