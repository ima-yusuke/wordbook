<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WordController extends Controller
{

    //Jsonファイルを読み込み、連想配列に変換する
    public function GetJson()
    {
        $url = public_path().'/word.json';
        $jsonString = file_get_contents($url);

        // word.jsonデータ
        $data = json_decode($jsonString, true);// JSONを連想配列に変換します

        return $data;
    }

    //カテゴリーを取得する
    public function GetCategory()
    {
        $data = $this->GetJson();

        $categories = [];

        // categories に $categoryが含まれていない場合のみ追加する
        foreach ($data as $value) {
            foreach ($value["category"] as $category) {
                if (!in_array($category, $categories)) {
                    $categories[] = $category;
                }
            }
        }

        return $categories;
    }

    //単語帳ページを表示する
    public function ShowWordPage()
    {
        $data = $this->GetJson();

        $categories = $this->GetCategory();

        return view("wordbook",compact("data","categories"));
    }

    //カテゴリーで検索し単語帳ページを表示する
    public function SearchCategory(Request $request)
    {
        $data = $this->GetJson();

        $tmpData = [];

        foreach ($data as $value){
            foreach ($value["category"] as $category){
                if($category == $request->category){
                    $tmpData[] = $value;
                }
            }
        }

        $data = $tmpData;

        $categories = $this->GetCategory();

        return view("wordbook",compact("data","categories"));

    }

}
