<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte;

class TestController extends Controller
{
    public function index()
    {
   	$crawler = Goutte::request('GET', 'https://duckduckgo.com/html/?q=Laravel');
    $crawler->filter('.result__title .result__a');
    echo $crawler->first();
    }
}
