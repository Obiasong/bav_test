<?php

namespace App\Models;

use DB;
use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageProducts extends Model
{
    use HasFactory;

    public static function getProducts()
    {
        $products = DB::table('products')
            ->get();

        return $products;
    }

    public static function deleteProductById($product_id)
    {

        $res = DB::table('products')
            ->where('id', $product_id)
            ->delete();

        return $res;
    }

    public static function getProductById($product_id)
    {
        $res = DB::table('products')
            ->where('id', $product_id)
            ->first();

        return $res;
    }

    public static function updateProductById($product_id,$name)
    {
        $res = DB::table('products')
            ->where('id', $product_id)
            ->update(['product' => $name]);

        return $res;
    }


    public static function createProduct($name,$user_id){
        $res = DB::table('products')
            ->insert(['product' => $name,'Users_id' => $user_id]);
        return $res;
    }
    public static function getFailureAlert($message)
    {
        $res = '<ul><li style="background-color: red;padding: 8px;color: white">' . $message . '</li>';
        return $res;
    }

    public static function getSuccessAlert($message)
    {
        $res = '<ul><li style="background-color: forestgreen;padding: 8px;color: white">' . $message . '</li>';
        return $res;
    }
}
