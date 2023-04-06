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
        $jewellery = Jewellery::latest('updated_at')->paginate(10);
        return view('welcome')->with('jewellery', $jewellery);
    }
}
