<?php

namespace App\Http\Controllers;

use App\Promotion;
use App\Shop;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPromobyShopId(Shop $shop)
    {
        $promotions = Promotion::with('shop','status', 'perimeter', 'type')->get()->where('shop_id', $shop->id);
        return json_encode($promotions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createOnePromo(Shop $shop)
    {
        $promotion = Promotion::create([
            'title'=>request('title'),
            'description'=>request('description'),
            'image'=>'/image/promo/0.jpg',
            'startDate'=>request('startDate'),
            'endDate'=>request('endDate'),
            'sendingPeriod'=>'2020-01-01 00:00:00',
            'limit'=>request('limit'),
            'qrCode'=>uniqid(),
            'shop_id'=>$shop->id,
            'status_id'=>1,
            'perimeter_id'=>1,
            'type_id'=>1,
        ]);


        return json_encode($promotion);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotion $promotion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        //
    }
}
