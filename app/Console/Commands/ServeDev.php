<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ServeDev extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'serve:dev';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run php artisan serve and bun dev --host';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting Laravel development server...');
        $serveProcess = popen('php artisan serve --port=3000', 'r');

        if ($serveProcess) {
            $this->info('Laravel development server started.');

            $this->info('Starting bun dev...');
            $bunProcess = popen('bun dev', 'r');

            if ($bunProcess)
                $this->info('bun dev started.');
            else
                $this->error('Failed to start bun dev.');
        } 
        else
            $this->error('Failed to start Laravel development server.');

        while (!feof($serveProcess) && !feof($bunProcess)) {
            echo fgets($serveProcess);
            echo fgets($bunProcess);
        }

        pclose($serveProcess);
        pclose($bunProcess);
    }
}
