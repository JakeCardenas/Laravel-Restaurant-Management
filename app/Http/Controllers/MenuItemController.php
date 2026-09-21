<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    //display gumagana na hehe akala ko nag error
    public function index()
    {
        $menuItems = MenuItem::all();
        return view('menu_items.index', compact('menuItems'));
    }

    public function create()
    {
        return view('menu_items.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:150',
            'category' => 'required|string',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'availability' => 'required|string',
        ]);

        MenuItem::create($validatedData);

        return redirect()->route('menu_items.index')->with('success', 'Menu item created successfully.');
    }

    public function edit(MenuItem $menu_item)
    {
        return view('menu_items.edit', compact('menu_item'));
    }

    public function update(Request $request, MenuItem $menu_item)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:150',
            'category' => 'required|string',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'availability' => 'required|string',
        ]);

        $menu_item->update($validatedData);

        return redirect()->route('menu_items.index')->with('success', 'Menu item updated successfully.');
    }

    public function destroy(MenuItem $menu_item)
    {
        $menu_item->delete();

        return redirect()->route('menu_items.index')->with('success', 'Menu item deleted successfully.');
    }
}
