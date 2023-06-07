<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu_items=new Menu();
       
        return response()->json([
            $menu_items->all()
           
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $menu_item=new Menu();
        $menu_item->name=$request->name;
        $menu_item->link=$request->link;
        $menu_item->visible=$request->visible;
        $menu_item->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }


    public function update(Request $request, $menu)
    {
      $menu_item=Menu::find($menu);
      if(is_null($menu_item)){
        return response()->json([
        
            "msg" => "Menú item no encontrado"
        ],404);
      }
      $menu_item->update($request->all());
    
      return response()->json([
        "status" => 1,
        "msg" => "Menú item se actualizado correctamente."
    ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($menu)
    {
        $menu_item=Menu::where(["id"=>$menu])->first();
        $menu_item->delete();
        return response()->json(["status"=>1,"msg"=>"El item menu fue eliminado exitosamente"]);
    }
}
