<?php

namespace App\Http\Controllers;

use App\Product;
use App\Attribute;
use App\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{

    public function index($id){
        $product = Product::findOrFail($id);

        $all_variants = Attribute::all();

        $product_variants = ProductVariant::where('product_id', $id)->get();



        return view('product.pvariant.index', compact('product','all_variants','product_variants'));

    }

    public function edit($id){

        $all_variants = Attribute::all();

        $product_variant = ProductVariant::where('id', $id)->first();

        return view('product.pvariant.edit', compact('all_variants','product_variant'));

    }

    public function update(Request $request){
        
        $product_variant = ProductVariant::where('id', $request->id)->first();

        $request->validate([
            "sku" => "required|max:12|unique:product_variants,sku,".$request->id,
            "stock" => "required|integer",
            "price" => "required|numeric|min:0",
            "variants"  => "required|array"
        ]);

        $product_variant->sku = $request->sku;
        $product_variant->stock = $request->stock;
        $product_variant->price = $request->price;
        $product_variant->variants = json_encode($request->variants);
        $product_variant->save();

        $notification = [
            "messege" => "Variant Updated",
            "alert" => "success"
        ];
        return redirect()->back()->with("notification", $notification);

    }

    public function store(Request $request){

        $request->validate([
            "sku" => "required|max:12|unique:product_variants,sku",
            "stock" => "required|integer",
            "price" => "required|numeric|min:0",
            "variants"  => "required|array"
        ]);


        $variant = new ProductVariant();

        $variant->product_id  = $request->id;
        $variant->sku = $request->sku;
        $variant->stock = $request->stock;
        $variant->price = $request->price;
        $variant->variants = json_encode($request->variants);
        $variant->save();


        $notification = [
            "messege" => "New User Registration Successfully",
            "alert" => "success"
        ];
        return redirect()->back()->with("notification", $notification);

    }

    public function delete(Request $request){
        $product_variant = ProductVariant::where('id', $request->id)->first();

        $product_variant->delete();

        $notification = [
            "messege" => "Product Variant Deleted Successfully",
            "alert" => "success"
        ];

        return redirect()->back()->with("notification", $notification);
    }
}
