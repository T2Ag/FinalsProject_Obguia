<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index()
    {
        $menuitems = MenuItem::orderBy('id')->get();

        return view('menuitems.index',['menuitems' => $menuitems]);
    }

    public function create()
    {
        return view('menuitems.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'item_name'     => 'required',
            'description'   => 'required',
            'price'         => 'required',
            'img_link'      => 'required|url',
            'category'      => 'required|in:Drink,Meal,Dessert'
        ]);

        MenuItem::create([
            'item_name'     => $request->item_name,
            'description'   => $request->description,
            'price'         => $request->price,
            'img_link'      => $request->img_link,
            'category'      => $request->category,
        ]);

        return redirect('/menuitems')->with('message', 'A new item has been added in the menu');
    }

    public function edit(MenuItem $menuitem)
    {
        return view('menuitems.edit', compact('menuitem'));
    }

    public function update(MenuItem $menuitem, Request $request)
    {
        $request->validate([
            'item_name'     => 'required',
            'description'   => 'required',
            'price'         => 'required',
            'img_link'      => 'required|url',
            'category'      => 'required|in:Drink,Meal,Dessert'
        ]);

        $menuitem->update($request->all());
        return redirect('/menuitems')->with('message', "$menuitem->item_name has been updated");
    }

    public function delete(MenuItem $menuitem)
    {
        $menuitem->delete();

        return redirect('/menuitems')->with('message', "$menuitem->item_name is gone F O R E V E R~");
    }
}
