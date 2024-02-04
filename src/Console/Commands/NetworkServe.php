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
    protected $name = 'serve:local';

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

        // get port from argument or default value
        $port = $this->getOptions()['port'] ?? 8000;
        $t = [];
        exec('ipconfig', $t);
        $index = array_search('Wireless LAN adapter Wi-Fi:', $t);
        $t = array_slice($t, $index, count($t));
        $value = collect($t)->filter(function ($item) {
            return strpos($item, 'IPv4 Address') !== false;
        })->first();
        if (!$value) {
            $this->error('No IP address found');
            exit;
        }

        $ip = trim(explode(":", $value)[1]);
        return [
            $ip,
            $port,
        ];
    }


    public function option($key = null)
    {
        return null;
    }
}
