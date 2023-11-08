<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function getCharacters(Request $request)
    {
        $perPage = 9;

        
        $page = $request->query('page', 1);

        $response = Http::get('https://hp-api.onrender.com/api/characters');
        $characters = json_decode($response->body());

       
        $totalPages = ceil(count($characters) / $perPage);

       
        $paginatedCharacters = array_slice($characters, ($page - 1) * $perPage, $perPage);

        return view('characters.index', compact('paginatedCharacters', 'page', 'totalPages'));
    }
}
