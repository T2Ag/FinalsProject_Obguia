<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{   
    //api for vue
    public function getAll()
    {
        $menuitems = MenuItem::orderBy('id')->get();

        return response()->json($menuitems);
    }

    public function storeMenuItem(Request $request) {
        $request->validate([
            'item_name'     => 'required',
            'description'   => 'required',
            'price'         => 'required',
            'img_link'      => 'required|url',
            'category'      => 'required|in:Drink,Meal,Dessert'
        ]);

        $menu = MenuItem::create([
            'item_name'     => $request->item_name,
            'description'   => $request->description,
            'price'         => $request->price,
            'img_link'      => $request->img_link,
            'category'      => $request->category,
        ]);

        return response()->json([
            'status' => "OK",
            'message' => 'Menu with ID# ' .$menu->id . ' has been created'
        ]);
    }

    public function destroy(MenuItem $menuitem)
    {   
        $details = $menuitem->first_Name;
        $menuitem->delete();

        return response()->json([
            'status' => "OK",
            'message' => 'Menu Item with the name ' .$details . ' has been deleted'
        ]);
    }

}
