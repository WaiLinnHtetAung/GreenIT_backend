<?php

namespace App\Http\Controllers\Admin;

use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePromotionsRequest;
use App\Http\Requests\UpdatePermissionsRequest;

class PromotionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Promotion::with('media')->get();

        return view('admin.promotion.index', compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.promotion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePromotionsRequest $request)
    {
        $promotion = Promotion::create($request->all());
        $img_name = $request->file('image');
        $logo_name = $request->file('logo');

        $promotion->addMedia($img_name)->toMediaCollection('promotion_image');
        $promotion->addMedia($logo_name)->toMediaCollection('promotion_logo');

        return redirect()->route('admin.promotions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        $promotion = $promotion->load('media');

        return view('admin.promotion.show', compact('promotion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        $promotion = $promotion->load('media');

        return view('admin.promotion.edit',  compact('promotion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionsRequest $request, Promotion $promotion)
    {
        $promotion->update($request->all());

        if($request->hasfile('image')) {
            foreach($promotion->media as $media) {
                $media->delete();
            }

            $promotion->addMedia($request->file('image'))->toMediaCollection('promotion');
        }

        return redirect()->route('admin.promotions.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();

        return redirect()->back();
    }
}
