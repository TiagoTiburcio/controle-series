<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;


class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = [
            'Agents of Shield',
            'O Bruxeiro',
            'Chef',
        ];

        return view(
            'series.index',
            compact('series')
        );
    }

    public function create(Request $request)
    {
        return view('series.create');
    }
}
