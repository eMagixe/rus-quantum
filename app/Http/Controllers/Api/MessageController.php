<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Classes\SaverFactory;
use Illuminate\Http\Request;
use Validator;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Простейшая валидация в ТЗ небыло пункта как именно валидировать данные так что выбрал на обязательность данных
        $validator = Validator::make(
            $request->all(),
            [
                "name" => ["required"],
                "phone" => ["required"],
                "message" => ["required"],
            ]
        );

        if ($validator->fails()) {
            return [
                "status" => false,
                "errors" => $validator->messages()
            ];
        }

        //Создаем фабрику
        $factory = new SaverFactory;

        //Получаем нужный тип сохранения. Если необходимо тип можно передавать и из пользовательского интерфейса.
        $creator = $factory->saveMessage("file");
        //$creator = $factory->saveMessage("db");

       $message = $creator->create([
            "name" => $request->name,
            "phone" => $request->phone,
            "message" => $request->message,
        ]);


        return [
            "status" => true,
            "message" => $message
        ];
    }

}