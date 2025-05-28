<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $menus = Menu::all();
    return view('admin.menus.index', compact('menus'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('admin.menus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('assets/images', 'public');
        $image = 'storage/' . $imagePath;
    } else {
        $image = null;
    }
    
    // Create menu item in DB
    Menu::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'image' => 'storage/' . $imagePath, // Stored as storage/assets/images/filename.jpg
    ]);

    // Redirect back to admin page with success message
    return redirect()->route('admin.menus.index')->with('success', 'Menu item added successfully!');
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
    public function edit(Menu $menu) {
        return view('admin.menus.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    $menu = Menu::findOrFail($id);

    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'category' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
    ]);

    $menu->name = $request->name;
    $menu->description = $request->description;
    $menu->price = $request->price;
    $menu->category = $request->category;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('assets/images', 'public');
        $menu->image = 'storage/' . $imagePath;
    }

    $menu->save();

    return redirect()->route('admin.menus.index')->with('success', 'Item updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
     public function destroy(Menu $menu) {
        $menu->delete();
        return back()->with('success', 'Item deleted');
    }

    // Customer: View menu
    public function customerMenu()
     {
    $menus = Menu::all(); // Make sure items exist in your DB
    return view('menu.menu', compact('menus'));
     }


}
