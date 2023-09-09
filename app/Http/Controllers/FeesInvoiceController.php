<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeesInvoice;
use App\Interfaces\FeesInvoiceRepositryInterface;
use App\Models\Feese;
use App\Models\FeesInvoice;
use App\Models\Student;
use Illuminate\Http\Request;

class FeesInvoiceController extends Controller
{
    protected $feesInvoice;
    public function __construct(FeesInvoiceRepositryInterface $feesInvoice)
    {
        $this->feesInvoice = $feesInvoice;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->feesInvoice->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeesInvoice $request)
    {
        return $this->feesInvoice->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($student_id)
    {
        return $this->feesInvoice->show($student_id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return $this->feesInvoice->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreFeesInvoice $request, $id)
    {
        //
        return $this->feesInvoice->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->feesInvoice->destroy($id);
    }


    public function getAmountFeese($id)
    {
        $amount = Feese::where('id', $id)->pluck('amount', 'id');
        return response()->json($amount, 200);
    }
}
