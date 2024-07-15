<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WordController extends Controller
{
    public function ShowWordPage()
    {
        $url = public_path().'/word.json';
        $jsonString = file_get_contents($url);

        $data = json_decode($jsonString, true);// JSONを連想配列に変換します

        return view("wordbook",compact("data"));
    }
}
