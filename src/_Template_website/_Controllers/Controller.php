<?php

namespace App\Units\%UnitName%\_Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class %UnitName%Controller extends Controller
{
    /**
     * Display the index view.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('%UnitHint%::index');
    }

    /**
     * Display the contacto view.
     *
     * @return \Illuminate\Http\Response
     */
    public function contacto()
    {
        return view('%UnitHint%::contacto');
    }
    
    /**
     * Display the nosotros view.
     *
     * @return \Illuminate\Http\Response
     */
    public function nosotros()
    {
        return view('%UnitHint%::nosotros');
    }
}
