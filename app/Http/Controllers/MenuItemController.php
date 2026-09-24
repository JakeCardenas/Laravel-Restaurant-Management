<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    //display gumagana na hehe akala ko nag error
    public function index()
    {
        $menuItems = MenuItem::latest()->get();
        return view('menu_items.index', compact('menuItems'));
    }

    public function create()
    {
        return view('menu_items.create');
    }

    public function store(Request $request)
    {
        MenuItem::create($request->validate($this->rules()));

        return redirect()->route('menu_items.index')->with('success', 'Menu item created successfully.');
    }

    public function edit(MenuItem $menu_item)
    {
        return view('menu_items.edit', compact('menu_item'));
    }

    public function update(Request $request, MenuItem $menu_item)
    {
        $menu_item->update($request->validate($this->rules()));

        return redirect()->route('menu_items.index')->with('success', 'Menu item updated successfully.');
    }

    public function destroy(MenuItem $menu_item)
    {
        $menu_item->delete();

        return redirect()->route('menu_items.index')->with('success', 'Menu item deleted successfully.');
    }

    // Shared validation rules for store and update
    private function rules(): array
    {
        return [
            'name' => 'required|string|max:150',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0|max:999999.99',
            'description' => 'nullable|string',
            'availability' => 'required|in:Available,Unavailable',
        ];
    }
}
