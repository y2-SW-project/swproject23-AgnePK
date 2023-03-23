<?php

namespace App\Http\Controllers;
use App\Models\Jewellery;
use Illuminate\Http\Request;

class JewelleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $jewellery = Jewellery::where('user_id', Auth::id())->get();
        $jewellery = Jewellery::latest('updated_at')->get();
        // dd($jewellery);
        return view('jewellery.index')->with('jewellery', $jewellery);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jewellery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'img' => 'file|image',
            'name' => 'required|max:255',
            'price' => 'required',
            'description' => 'required|max:255',
            //bottom 2 are enum
            'category' => 'required',
            'material' => 'required',
            //order id?
        ]);
        $img = $request->file('img');
        $extention = $img->getClientOriginalExtension();
        $filename = '_' . $request->input('name') . '.' . $extention;
        $path = $img->storeAs('public/images', $filename);



        Jewellery::create([
            'img' => $filename,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category' => $request->category,
            'material' => $request->material,
        ]);

        return to_route('jewellery.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jewellery $jewellery)
    {
        return view('jewellery.show')->with('jewellery', $jewellery);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jewellery $jewellery)
    {
        return view('jewellery.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jewellery $jewellery)
    {
        $request->validate([
            'img' => 'file|image',
            'name' => 'required|max:255',
            'price' => 'required',
            'description' => 'required|max:255',
            //bottom 2 are enum
            'category' => 'required',
            'material' => 'required',
            //order id?
        ]);
        $img = $request->file('img');
        $extention = $img->getClientOriginalExtension();
        $filename = '_' . $request->input('name') . '.' . $extention;
        $path = $img->storeAs('public/images', $filename);



        $jewellery->update([
            'img' => $filename,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category' => $request->category,
            'material' => $request->material,
        ]);

        return to_route('jewellery.show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
