<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

class MapController extends Controller
{
    public function index(){
        // Mapper::map(1.045626, 104.030457);
        // Mapper::marker(1.045626, 104.030457, ['draggable' => true, 'eventMouseOver' => 'console.log("mouse over");']);

        return view('map');
    }
}
