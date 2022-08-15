<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function add(){
        return view('product.add');
    }

    public function store(Request $request){

        $request->validate([
            "name" => "required|max:100|unique:products,name"
        ]);

        $p = new Product();
        $p->name = $request->name;
        $p->save();

        $notification = [
            "messege" => "Product Added",
            "alert" => "success"
        ];
        return redirect(route('front.index'))->with("notification", $notification);
        // dd($request->all());
    }


    public function edit($id){

        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));

    }

    public function update(Request $request){

        $product = Product::findOrFail($request->id);

        $request->validate([
            "name" => "required|max:100|unique:products,name,$product->id"
        ]);

        $product->name = $request->name;
        $product->save();

        $notification = [
            "messege" => "Product Updated",
            "alert" => "success"
        ];
        return redirect(route('front.index'))->with("notification", $notification);

    }




    public function delete(Request $request){
        $product = Product::findOrFail($request->id);

        // $values = AttributeValue::where('attribute_id', $variant->id)->get();

        // if(count($values) > 0){
        //     foreach ($values as $value) {
        //         $value->delete();
        //     }
        // }

        $product->delete();

        $notification = [
            "messege" => "Product Deleted",
            "alert" => "success"
        ];
        return redirect()->back()->with("notification", $notification);

    }
}
