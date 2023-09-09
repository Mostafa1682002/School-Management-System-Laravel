<?php

namespace App\Repositry;

use App\Interfaces\FeesInvoiceRepositryInterface;
use App\Models\Feese;
use App\Models\FeesInvoice;
use App\Models\Student;
use App\Models\StudentAccount;
use Exception;

class FeesInvoiceRepositry implements FeesInvoiceRepositryInterface
{

    public function index()
    {
        $feesInvoices = FeesInvoice::all();
        return view('FeesInvoices.index', compact('feesInvoices'));
    }

    public function show($student_id)
    {
        $student = Student::findOrFail($student_id);
        $feese = Feese::where('classe_id', $student->class_id)->get();
        // return $feese;
        return view('FeesInvoices.add', compact('student', 'feese'));
    }

    public function store($request)
    {
        try {

            $fees_invoice = new FeesInvoice();
            $fees_invoice->student_id = $request->student_id;
            $fees_invoice->school_grade_id = $request->school_grade_id;
            $fees_invoice->classe_id = $request->classe_id;
            $fees_invoice->section_id = $request->section_id;
            $fees_invoice->feese_id = $request->feese_id;
            $fees_invoice->amount = $request->amount;
            $fees_invoice->description = $request->description;
            $fees_invoice->save();


            //Save Invoice In Student Accounts table
            $student_account = new StudentAccount();
            $student_account->student_id = $request->student_id;
            $student_account->fees_invoice_id = $fees_invoice->id;
            $student_account->type = 'invoice';
            $student_account->debit = $request->amount;
            $student_account->credit = 0;
            $student_account->description = $request->description;
            $student_account->save();

            return redirect()->route('feese_invoice.index')->with('save', '4');
        } catch (Exception $e) {
            return redirect()->back()->with('error', '4');
        }
    }


    public function edit($id)
    {
        try {
            $feesInvoice = FeesInvoice::findOrFail($id);
            $feese = Feese::all();
            return view('FeesInvoices.edite', compact('feesInvoice', 'feese'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', '44');
        }
    }
    public function update($request, $id)
    {
        try {
            $fees_invoice = FeesInvoice::findOrFail($id);
            $fees_invoice->feese_id = $request->feese_id;
            $fees_invoice->amount = $request->amount;
            $fees_invoice->description = $request->description;
            $fees_invoice->save();


            //Upadte Invoice In Student Accounts table
            $student_accounts = StudentAccount::where('fees_invoice_id', $id)->get();
            foreach ($student_accounts  as $student_account) {
                $student_account->debit = $request->amount;
                $student_account->description = $request->description;
                $student_account->save();
            }

            return redirect()->route('feese_invoice.index')->with('update', '44');
        } catch (Exception $e) {
            return redirect()->back()->with('error', '44');
        }
    }


    public function destroy($id)
    {
        try {
            FeesInvoice::destroy($id);
            return redirect()->route('feese_invoice.index')->with('delete', '44');
        } catch (Exception $e) {
            return redirect()->back()->with('error', '44');
        }
    }
}
