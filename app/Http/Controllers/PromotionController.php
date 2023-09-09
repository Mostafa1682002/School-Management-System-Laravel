<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePromotion;
use App\Interfaces\PromotionRepositryInterface;
use App\Models\Graduated;
use App\Models\Promotion;
use App\Models\Student;
use App\Repositry\PromotionRepositry;
use Exception;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    protected $promotion;
    public  function  __construct(PromotionRepositryInterface $promotion)
    {
        $this->promotion = $promotion;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->promotion->allPromotion();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->promotion->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePromotion $request)
    {
        return $this->promotion->storePromotion($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promotion $promotion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    //Graduate Student
    public function update(Request $request, $id)
    {

        return $this->promotion->graduateStudent($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyOne($id, $stu_id)
    {
        return $this->promotion->deletePromotion($id, $stu_id);
    }
    public function destroy($id)
    {
        return $this->promotion->deleteAllPromotion();
    }
}
