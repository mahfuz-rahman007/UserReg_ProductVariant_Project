<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\AttributeValue;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    public function index(){

        $variants = Attribute::all();

        return view('variant.index', compact('variants'));

    }

    public function store(Request $request){

        $request->validate([
            "name" => "required|max:50"
        ]);

        $variant = new Attribute();
        $variant->name = $request->name;
        $variant->save();

        $notification = [
            "messege" => "New Variant Added",
            "alert" => "success"
        ];
        return redirect()->back()->with("notification", $notification);
    }

    public function edit($id){

        $variant = Attribute::findOrFail($id);
        return view('variant.edit', compact('variant'));

    }

    public function update(Request $request){

        $variant = Attribute::findOrFail($request->id);

        $request->validate([
            "name" => "required|max:50"
        ]);

        $variant->name = $request->name;
        $variant->save();

        $notification = [
            "messege" => "Variant Updated",
            "alert" => "success"
        ];
        return redirect(route('variant.index'))->with("notification", $notification);

    }




    public function delete(Request $request){
        $variant = Attribute::findOrFail($request->id);

        $values = AttributeValue::where('attribute_id', $variant->id)->get();

        if(count($values) > 0){
            foreach ($values as $value) {
                $value->delete();
            }
        }

        $variant->delete();

        $notification = [
            "messege" => "Variant Deleted",
            "alert" => "success"
        ];
        return redirect()->back()->with("notification", $notification);

    }
}
