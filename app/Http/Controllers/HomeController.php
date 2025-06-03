<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Room;
use App\Models\Slider;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $slider = Slider::where('status','1')->with('media')->get();
        $room_and_villa = Room::where('is_active','1')->with('media')->limit(4)->get();
        $fasilitas = Fasilitas::where('status','1')->with('media')->get();
        $testi = Testimoni::where('is_publish','1')->with('media')->get();

        // return response()->json($room_and_villa);
        return view('frontend.home',compact('slider','room_and_villa','fasilitas','testi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
