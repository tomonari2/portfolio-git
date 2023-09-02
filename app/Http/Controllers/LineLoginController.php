<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LineLoginController extends Controller
{
    protected Str $str;
    protected $lineLoginChannelID = 2000573052;

    public function __construct(Str $str)
    {
        $this->str = $str;
    }
    /**
     * LINEログイン認可URLにリダイレクトする。
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function lineLogin(Request $request)
    {
        $state = $this->str::random(40);
        session(['state' => $state]);

        $queryData = array(
            'response_type' => 'code',
            'client_id' => $this->lineLoginChannelID,
            'redirect_uri' => route('line.callback'),
            'state' => $state,
            'scope' => 'openid',
        );

        $queryString = http_build_query($queryData, '', '&', PHP_QUERY_RFC3986);

        echo $queryString;
    }

    /**
     * LINEログインの認可レスポンスを処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callback(Request $request)
    {
    }
}
