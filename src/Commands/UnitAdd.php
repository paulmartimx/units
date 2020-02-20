<?php

namespace Units\Commands;

use Illuminate\Console\Command;

class UnitAdd extends Command
{


    protected $name_replace = "%UnitName%";
    protected $hint_replace = "%UnitHint%";
    protected $name = "";
    protected $hint = "";
    
    protected $basedir;
    protected $basepath;
    protected $source = "";
    protected $dest = "";

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'unit:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea un nuevo Unit';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->basepath = config('units.basepath');
        $this->source = __DIR__."/../_Template";

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        
        $this->name = $this->ask('Nombre del Unit');
        $this->hint = $this->ask('Hint del Unit');
        
        $this->dest = "{$this->basepath}/{$this->name}";

        if(is_dir($this->dest))
            return $this->error("[ERROR]: La carpeta {$this->name} ya existe en {$this->basepath}");

        if(!is_dir($this->basepath))
          mkdir($this->basepath, 0755);

        mkdir($this->dest, 0755);

        foreach (
         $iterator = new \RecursiveIteratorIterator(
          new \RecursiveDirectoryIterator($this->source, \RecursiveDirectoryIterator::SKIP_DOTS),
          \RecursiveIteratorIterator::SELF_FIRST) as $item
        ) {
          if ($item->isDir()) {
            mkdir($this->dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
          } else {

            copy($item, $this->dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
            if(file_exists($this->dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName()))
            {
                $this->replace_in_file($this->dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName(), [
                    $this->name_replace => $this->name,
                    $this->hint_replace => $this->hint
                ]);
                
            }
          }

        }

        // Renombra la plantilla del controlador copiado.
        $controller_file = "{$this->dest}/_Controllers/Controller.php";
        $rename_to = "{$this->dest}/_Controllers/{$this->name}Controller.php";

        if(file_exists( $controller_file ))
        {
          rename($controller_file, $rename_to);
        }
        

        $this->info("{$this->name} creado exitosamente en {$this->dest}.");
        
    }


    /**
     * Replaces a string in a file
     *
     * @param string $FilePath
     * @param string $OldText text to be replaced
     * @param string $NewText new text
     * @return array $Result status (success | error) & message (file exist, file permissions)
     */
    function replace_in_file($FilePath, $replacements = [])
    {
        $Result = array('status' => 'error', 'message' => '');
        if(file_exists($FilePath)===TRUE)
        {
            if(is_writeable($FilePath))
            {
                try
                {
                    $FileContent = file_get_contents($FilePath);
                    
                    foreach($replacements as $OldText => $NewText)
                    {
                        $FileContent = str_replace($OldText, $NewText, $FileContent);
                    }
                    

                    if(file_put_contents($FilePath, $FileContent) > 0)
                    {
                        $Result["status"] = 'success';
                    }
                    else
                    {
                       $Result["message"] = 'Error while writing file';
                    }
                }
                catch(Exception $e)
                {
                    $Result["message"] = 'Error : '.$e;
                }
            }
            else
            {
                $Result["message"] = 'File '.$FilePath.' is not writable !';
            }
        }
        else
        {
            $Result["message"] = 'File '.$FilePath.' does not exist !';
        }
        return $Result;
    }
}
