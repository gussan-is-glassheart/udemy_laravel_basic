<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
  public function index()
  {
    // Eloquent(エロクアント)
    $values = Test::all();
    $count = Test::count();
    $first = Test::findOrFail(1);
    $whereBBB = Test::where('text', '=', 'bbb')->get();

    // クエリビルダ
    $queryBuilder = DB::table('tests')->where('text', '=', 'bbb')
    ->select('id', 'text')
    ->get();

    // エロクアント vs クエリビルダ
    // 速度的には多少クエリビルダが早いとされているが、
    // 基本的にエロクアントを優先的に使う方がメリットが多い

    // ・リレーション(複数テーブルの連携)
    // ・スコープ(クエリの分割)などの機能を使えるため

    dd($values, $count, $first, $whereBBB, $queryBuilder);

    return view('tests.test', compact('values'));
  }
}
