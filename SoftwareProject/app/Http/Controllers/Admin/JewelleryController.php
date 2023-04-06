<?php

namespace App\Http\Controllers\Admin;
use App\Models\Jewellery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JewelleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        // $jewellery = Jewellery::where('user_id', Auth::id())->get();
        $jewellery = Jewellery::latest('updated_at')->paginate(10);
        // dd($jewellery);
        return view('admin.jewellery.index')->with('jewellery', $jewellery);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        // $jewellery = Jewellery::where('user_id', '=', $user->id)->get();

        $categories = ['earrings', 'ring', 'necklace', 'bracelets'];
        $materials = ['sterling silver', 'gold', 'rosegold', 'white gold', 'bronze'];
        return view('admin.jewellery.create')->with('categories', $categories)->with('materials', $materials);
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
        $filename = $request->input('name') . '.' . $extention;
        $path = $img->storeAs('public/images', $filename);



        Jewellery::create([
            'img' => $filename,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category' => $request->category,
            'material' => $request->material,
        ]);

        return to_route('admin.jewellery.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jewellery $jewellery)
    {
        // $order = Jewellery::with('orders')->get();
        // dd($jewellery);
        $allJewellery = Jewellery::latest('updated_at')->paginate(3);
        return view('admin.jewellery.show')->with('jewellery', $jewellery)->with('allJewellery', $allJewellery);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jewellery $jewellery)
    {
        $categories = ['earrings', 'ring', 'necklace', 'bracelets'];
        $materials = ['sterling silver', 'gold', 'rosegold', 'white gold', 'bronze'];
        return view('admin.jewellery.edit')->with('jewellery', $jewellery)->with('categories', $categories)->with('materials', $materials);
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
        $filename = $request->input('name') . '.' . $extention;
        $path = $img->storeAs('public/images', $filename);

        $jewellery->update([
            'img' => $filename,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category' => $request->category,
            'material' => $request->material,
        ]);

        return to_route('admin.jewellery.show', $jewellery);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jewellery $jewellery)
    {
        $jewellery->delete();

        return to_route('admin.jewellery.index', $jewellery);
    }
    /**
     * Adding jewellery to cart.
     */


    public function jewelleryCart()
    {
        return view('admin.jewellery.cart');
    }
    public function addJewellerytoCart($id)
    // i tried to change the $id to Jewellery $jewellery- didnt work
    {
        $jewellery = Jewellery::findOrFail($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "quantity" => 1,
                "name" => $jewellery->name,
                "price" => $jewellery->price,
                "description" => $jewellery->description,
                "img" => $jewellery->img,
                "category" => $jewellery->category,
                "material" => $jewellery->material,
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Jewellery has been added to cart!');
    }

    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'jewellery added to cart.');
        }
    }

    public function deleteProduct(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'jewellery successfully deleted.');
        }
    }
}
