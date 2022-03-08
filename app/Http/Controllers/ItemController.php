<?php

namespace App\Http\Controllers;

use Auth;
use App\Item;
use DateTime;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        $item = new Item();
        $item->name = $request->name;

        if($item->save()) session()->flash('toast', ['success', 'Barang berhasil ditambahkan']);
        else session()->flash('toast', ['error', 'Barang gagal ditambahkan']);

        $ref = app('firebase.firestore')->database()->collection('logs')->newDocument();
        $ref->set([
            'user' => json_decode(request()->user()),
            'item' => json_decode($item),
            'action' => 'add',
            'at' => \Carbon\Carbon::now()
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        $item->name = $request->name;

        if($item->update()) session()->flash('toast', ['success', 'Barang berhasil diubah']);
        else session()->flash('toast', ['error', 'Barang gagal diubah']);

        $ref = app('firebase.firestore')->database()->collection('logs')->newDocument();
        $ref->set([
            'user' => json_decode(request()->user()),
            'item' => json_decode($item),
            'action' => 'update',
            'at' => \Carbon\Carbon::now()
        ]);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        if(request()->user()->role != 'admin') return;

        if($item->delete()) session()->flash('toast', ['success', 'Barang berhasil dihapus']);
        else session()->flash('toast', ['error', 'Barang gagal dihapus']);

        $ref = app('firebase.firestore')->database()->collection('logs')->newDocument();
        $ref->set([
            'user' => json_decode(request()->user()),
            'item' => json_decode($item),
            'action' => 'delete',
            'at' => \Carbon\Carbon::now()
        ]);

        return redirect('/');
    }
}
