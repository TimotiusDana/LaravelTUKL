<?php

namespace App\Http\Controllers;

use App\Models\Inventories;
use Illuminate\View\View;

class InventoriesController extends Controller
{
    /**
     * index
     * 
     * @return void
     */
     public function index() : View
    {
        //get all products
        $inventories = Inventories::latest()->paginate(10);

        //render view with products
        return view('inventories.index', compact('inventories'));
    }
}
