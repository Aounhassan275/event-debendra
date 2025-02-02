<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function list(){
        $menus = Menu::all();
        return view('admin.menu.list', compact('menus'));
    }
    public function add(){
        return view('admin.menu.add');
    }
    public function store(Request $request){
        Menu::create($request->all());
        return redirect()->route('menu.list')->with('success','Menu Added Successfully...');
    }
    public function edit($id){
        $edit = Menu::find($id);
        return view('admin.menu.edit', compact('edit'));
    }
    public function update(Request $request){
        Menu::find($request->id)->update($request->all());
        return redirect()->route('menu.list')->with('success','Menu Updated Successfully...');
    }
    public function delete($id){
        Menu::find($id)->delete();
        return redirect()->back()->with('success','Menu Deleted Successfully...');
    }
}
