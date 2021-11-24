<?php
namespace App\Classes;

use App\Interfaces\MessageCreator;
use Illuminate\Support\Facades\Storage;

class FileSaver implements MessageCreator {

    public function create($data) {
        Storage::disk('local')->put('messages.json', implode("|", $data) . ", ");
    }
}