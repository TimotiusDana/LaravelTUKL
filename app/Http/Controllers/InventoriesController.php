<?php

namespace App\Http\Controllers;

use App\Models\Inventories;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('inventories.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'image'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'item_code'         => 'required|min:5',
            'item_name'         => 'required|min:5',
            'pic'         => 'required|min:2',
            'location'      => 'required|min:3',
            'description'   => 'required|min:10',
            'price'         => 'required|numeric',
            'stock'         => 'required|numeric'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('inventories', $image->hashName());

        //create product
        Inventories::create([
            'image'         => $image->hashName(),
            'item_code'         => $request->item_code,
            'item_name'         => $request->item_name,
            'pic'         => $request->pic,
            'location'         => $request->location,
            'description'   => $request->description,
            'price'         => $request->price,
            'stock'         => $request->stock
        ]);

        //redirect to index
        return redirect()->route('inventories.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
