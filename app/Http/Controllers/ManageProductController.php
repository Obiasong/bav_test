<?php

namespace App\Http\Controllers;

use App\Models\ManageProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;
use View;

class ManageProductController extends Controller
{
    function __constructor()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    public function showUserDashboard()
    {

        $products = ManageProducts::getUserProducts(Auth::user()->id);
        $div = 0;
        $product_list = View::make('manage_products/product-images', compact('products', 'div'));

        return view('dashboard', compact('product_list'));
    }

    public function showProductListPage()
    {

        $products = ManageProducts::getProducts();

        $product_list = View::make('manage_products/products-list', compact('products'));

        return view('manage_products.manage_products', compact('product_list'));
    }


    public function showEditProductPage(Request $request)
    {

        $this->validate($request, ['product_id' => 'required']);

        $product_id = $request->get('product_id');
        Session::put('product_id', $product_id);

        return Redirect::to('/manage_products/edit');

    }

    public function getEditPage()
    {

        $product_id = Session::get('product_id');
        $product = ManageProducts::getProductById($product_id);

        return view('manage_products.edit_product', compact('product'));

    }

    public function deleteProduct(Request $request)
    {

        $this->validate($request, ['product_id' => 'required']);

        $product_id = $request->get('product_id');

        $res = ManageProducts::deleteProductById($product_id);

        if ($res > 0) {
            return Redirect::to('/manage_products')->with(['status' => ManageProducts::getSuccessAlert('Product deleted successfully')]);
        } else {
            return Redirect::to('/manage_products')->with(['status' => ManageProducts::getFailureAlert('Product could not be deleted')]);
        }
    }

    public function saveProductChanges(Request $request)
    {

      $ver = [
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
        'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
      ];
      $this->validate($request, $ver);

      $name = $request->get('name');
      $desc = $request->get('description');
      $cost = $request->get('price');
      $imageName = Auth::user()->id.time().'.'.$request->product_image->extension();
      $request->product_image->move(public_path('images'), $imageName);

        $product_id = Session::get('product_id');
        $product = ManageProducts::updateProductById($product_id, $name, $desc, $cost, $imageName);

        Session::forget('product_id');
        if ($product > 0) {
            return Redirect::to('/manage_products')->with(['status' => ManageProducts::getSuccessAlert('Product updated successfully')]);
        } else {
            return Redirect::to('/manage_products')->with(['status' => ManageProducts::getFailureAlert('Product could not be updated')]);
        }

    }

    public function showCreateProductPage()
    {

        return view('manage_products.new_product');

    }

    public function createProduct(Request $request)
    {
        $ver = [
          'name' => 'required',
          'description' => 'required',
          'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
          'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
        $this->validate($request, $ver);

        $name = $request->get('name');
        $desc = $request->get('description');
        $cost = $request->get('price');
        $imageName = Auth::user()->id.time().'.'.$request->product_image->extension();

        $request->product_image->move(public_path('images'), $imageName);
        $product = ManageProducts::createProduct($name, $desc, $cost, $imageName, Auth::user()->id);

        Session::forget('product_id');
        if ($product > 0) {
            return Redirect::to('/manage_products/create')->with(['status' => ManageProducts::getSuccessAlert('Product created successfully')]);
        } else {
            return Redirect::to('/manage_products/create')->with(['status' => ManageProducts::getFailureAlert('Product could not be created')]);
        }

    }
}
