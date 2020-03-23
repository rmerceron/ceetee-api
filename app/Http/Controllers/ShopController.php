<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return false|string
     */
    public function getAll()
    {
        $shops = Shop::with('category','address')->get();
        return json_encode($shops);
    }

    public function findOneById($shop)
    {
        $shops = Shop::with('category','address')->get()->where('id', $shop);
        return json_encode($shops);
    }
}
