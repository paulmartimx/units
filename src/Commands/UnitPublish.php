<?php

namespace Units\Commands;

use Illuminate\Console\Command;

use UnitManager;

class UnitPublish extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'unit:publish {--D|delete}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publica los assets de cada Unit';    


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
      $manager = new UnitManager;
      foreach($manager->getUnits() as $unit)
      {
        if(is_dir("{$unit->path}/SourceDist"))
          
          $this->copyContents(

            "{$unit->path}/SourceDist",
            public_path("app_units/{$unit->hint}"),
            $this->option('delete')

          );
        
      }

    }

    protected function copyContents($source, $dest, $delete_dest_first = false)
    {

      if($delete_dest_first)
        if(is_dir($dest))
          $this->delTree($dest);

        if(!is_dir($dest))
          mkdir($dest, 0755);

        foreach (
         $iterator = new \RecursiveIteratorIterator(
          new \RecursiveDirectoryIterator($source, \RecursiveDirectoryIterator::SKIP_DOTS),
          \RecursiveIteratorIterator::SELF_FIRST) as $item
       ) {
          if ($item->isDir()) {

            if( !is_dir( $dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName() ))
              mkdir($dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
            

          } else {
            copy($item, $dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
          }
        }
      }


      protected function delTree($dir) {
         $files = array_diff(scandir($dir), array('.','..'));
          foreach ($files as $file) {
            (is_dir("$dir/$file")) ? $this->delTree("$dir/$file") : unlink("$dir/$file");
          }
          return rmdir($dir);
        }
    }





