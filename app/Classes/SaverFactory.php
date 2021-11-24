<?php

namespace App\Classes;

use App\Classes\DBSaver;

class SaverFactory {
    public function saveMessage($type) {
        switch ($type) {
            case "db": return new DBSaver;
            case "file": return new FileSaver;
            default: throw new Exception("Error type save.");
        }
    }
}
