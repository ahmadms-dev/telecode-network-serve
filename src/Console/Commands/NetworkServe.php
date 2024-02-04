<?php

namespace Telecode\NetworkServe\Console\Commands;

use Illuminate\Foundation\Console\ServeCommand;

class NetworkServe extends ServeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'serve:local';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return array
     */
    protected function getHostAndPort()
    {

        $t = [];
        exec('ipconfig', $t);
        $index = array_search('Wireless LAN adapter Wi-Fi:', $t);
        $t = array_slice($t, $index, 4);
        $ip = trim(explode(":", $t[3])[1]);
        return [
            $ip,
            $this->port(),
        ];
    }

    protected function port()
    {
        return 8000;
    }

    public function option($key = null)
    {
        return null;
    }
}
