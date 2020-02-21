<?php

namespace Units\Commands;

use Illuminate\Console\Command;
use Exception;

class UnitList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'unit:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Listado de Units instalables desde un endpoint';

    protected $endpoint;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
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
        
        try {

            $contextOptions = array(
                "ssl" => array(
                    "verify_peer"      => false,
                    "verify_peer_name" => false,
                ),
            );

            $body = file_get_contents($this->endpoint, false, stream_context_create($contextOptions));
            $modules = explode(",", $body);

            $this->info(count($modules) . ' módulos en total.');

            foreach($modules as $module)
            {
                $this->comment($module);
            }
            
        } catch (Exception $e) {
                
            $this->error('No se ha podido recuperar la lista remota. ¿Existe una conexión a Internet?');

        }
        
    }
}
