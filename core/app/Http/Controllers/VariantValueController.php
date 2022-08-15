<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\AttributeValue;
use Illuminate\Http\Request;

class VariantValueController extends Controller
{

    public function index($id){

        $variant = Attribute::findOrFail($id);

        $values = AttributeValue::where('attribute_id', $id)->get();

        return view('variant.value.index', compact('values', 'variant'));

    }

    public function store(Request $request){

        $request->validate([
            "value" => "required|max:50"
        ]);

        $variant = new AttributeValue();
        $variant->attribute_id = $request->attribute_id;
        $variant->value = $request->value;
        $variant->save();

        $notification = [
            "messege" => "New Variant Value Added",
            "alert" => "success"
        ];
        return redirect()->back()->with("notification", $notification);

    }

    public function edit($id){

        $value = AttributeValue::findOrFail($id);

        $variant = Attribute::findOrFail($value->attribute_id);


        return view('variant.value.edit', compact('value','variant'));

    }

    public function update(Request $request){

        $value = AttributeValue::findOrFail($request->id);


        $request->validate([
            "value" => "required|max:50"
        ]);

        $value->value = $request->value;
        $value->save();

        $notification = [
            "messege" => "Variant Value Updated",
            "alert" => "success"
        ];

        return redirect()->back()->with("notification", $notification);

    }




    public function delete(Request $request){
        $value = AttributeValue::findOrFail($request->id);

        $value->delete();

        $notification = [
            "messege" => "Value Deleted",
            "alert" => "success"
        ];
        return redirect()->back()->with("notification", $notification);

    }

}
