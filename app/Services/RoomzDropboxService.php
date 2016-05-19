<?php

namespace App\Services;

use App\Events\SomeEvent;

class RoomzDropboxService
{
    public function fire($job, $data)
    {
        sleep(2);
        // dd($data);
        \Event::fire(new SomeEvent($data));
    }
}
