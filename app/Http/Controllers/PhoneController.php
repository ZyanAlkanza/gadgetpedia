<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $phone = Phone::where('model', 'LIKE', '%'.$request->search.'%')->orWhere('brand', 'LIKE', '%'.$request->search.'%')->paginate(8);
        }else{
            $phone = Phone::paginate(8);
        }

        return view('dashboard.phone', compact('phone'))->with('title', 'Phone');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.phone-create')->with('title', 'Add Phone');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'price' => 'required',
            'stock' => 'required'
        ]);

        $request = Phone::create([
            'brand' => $request->brand,
            'model' => $request->model,
            'price' => $request->price,
            'stock' => $request->stock,
            'desc' => $request->desc
        ]);

        return redirect('phone')->with('status', 'Data Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $phone = Phone::findorfail($id);
        
        return view('dashboard.phone-detail', compact('phone'))->with('title', 'Phone Detail');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $phone = Phone::findorfail($id);
        return view('dashboard.phone-edit', compact('phone'))->with('title', 'Edit Phone');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'price' => 'required',
            'stock' => 'required'
        ]);

        $request = Phone::where('id', $id)->update([
            'brand' => $request->brand,
            'model' => $request->model,
            'price' => $request->price,
            'stock' => $request->stock,
            'desc' => $request->desc
        ]);

        return redirect('phone')->with('status', 'Data Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
