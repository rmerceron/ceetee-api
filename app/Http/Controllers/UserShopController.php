<?php

namespace App\Http\Controllers;

use App\Shop;
use App\TraderShop;
use App\User;
use App\UserShop;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function findOneById(User $user)
    {
        if ($user->userType_id == 2){
            $tradershops = TraderShop::with('user', 'shop', 'shop.category', 'shop.address')->get()->where('user_id', $user->id);
            return json_encode($tradershops);
        }
        if ($user->userType_id == 3){
            $usershops = UserShop::with('user', 'shop', 'shop.category', 'shop.address')->get()->where('user_id', $user->id);
            return json_encode($usershops);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Shop $shop
     * @return Response
     */
    public function addOneFavory(Shop $shop)
    {
        $favory = UserShop::create([
            'user_id'=>request('userId'),
            'shop_id'=>$shop->id
        ]);
        return json_encode($favory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserShop  $userShop
     * @return string
     */
    public function deleteOneFavory(UserShop $userShop)
    {
        UserShop::destroy($userShop->id);
        return 'the favory was correctly deleting !';
    }
}
