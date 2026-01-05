<?php

namespace App\Http\Controllers;

use App\Models\Inventories;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;
use Dompdf\Options;

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

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get product by ID
        $inventories = Inventories::findOrFail($id);

        //render view with product
        return view('inventories.show', compact('inventories'));
    }


    /**
     * edit
     * 
     * @param mixed $id
     * @return View 
     */
    public function edit(string $id): View
    {
        $inventories = Inventories::findOrFail($id);

        return view('inventories.edit', compact('inventories'));
    }

    /**
     * update
     * 
     * @param mixed $request
     * @param mixed $id
     * @return RedirectResponse
     */

    public function update(Request $request, $id): RedirectResponse
{
    //validate form
    $request->validate([
        'image'         => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        'item_code'     => 'required|min:5',
        'item_name'     => 'required|min:5',
        'pic'           => 'required|min:2',
        'location'      => 'required|min:3',
        'description'   => 'required|min:10',
        'price'         => 'required|numeric',
        'stock'         => 'required|numeric'
    ]);

    $inventories = Inventories::findOrFail($id);

    if ($request->hasFile('image')) {
        // Delete old image
        Storage::delete('inventories/'.$inventories->image);

        // Upload new image
        $image = $request->file('image');
        $image->storeAs('inventories', $image->hashName());

        // Update with new image - GUNAKAN DATA DARI $request
        $inventories->update([
            'image'         => $image->hashName(),
            'item_code'     => $request->item_code,
            'item_name'     => $request->item_name,
            'pic'           => $request->pic,
            'location'      => $request->location,
            'description'   => $request->description,
            'price'         => $request->price,
            'stock'         => $request->stock
        ]);
    } else {
        // Update without image - GUNAKAN DATA DARI $request
        $inventories->update([
            'item_code'     => $request->item_code,
            'item_name'     => $request->item_name,
            'pic'           => $request->pic,
            'location'      => $request->location,
            'description'   => $request->description,
            'price'         => $request->price,
            'stock'         => $request->stock
        ]);
    }

    return redirect()->route('inventories.index')->with(['success' => 'Data Berhasil Diubah!']);
}

/**
     * exportPdf
     *
     * @return mixed
     */
    public function exportPdf()
    {
        
        $inventories = Inventories::all();

        
        $html = view('inventories.pdf', compact('inventories'))->render();

        $options = new Options();
        $options->set('isRemoteEnabled', true); 
        $options->set('defaultFont', 'sans-serif');
        
        $dompdf = new Dompdf($options);

    
        $dompdf->loadHtml($html);

     
        $dompdf->setPaper('A4', 'landscape');

        
        $dompdf->render();

        
        return $dompdf->stream('laporan-inventaris-tukl.pdf');
    }
}