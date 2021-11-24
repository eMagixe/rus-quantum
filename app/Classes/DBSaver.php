<?php
namespace App\Classes;

use App\Interfaces\MessageCreator;
use App\Models\Message;

class DBSaver implements MessageCreator {

    public function create($data) {
        Message::create($data);
    }

}