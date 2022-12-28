<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class IncomeController extends Controller
{
    // public function index()
    // {
    //     $income_total = DB::table('incomes')->sum('amount_riels');
    //     //Add the $opened_counts variable to the compact function
    //     return view('Frontend-Layout.incomes.index', compact(
    //         'income_total', 
    //     ));
    // }
    public function ViewIncome(Request $request)
    {
        $incomes = Income::latest()->get();
        $income_khtotal = DB::table('incomes')->sum('amount_riels');
        $income_usdtotal = DB::table('incomes')->sum('amount_usd');
        // $data = Income::select(DB::raw("SUM(amount_riels) as count"))
        //     ->orderBy("created_at")
        //     ->groupBy(DB::raw("year(created_at)"))
        //     ->get();

        return view('Frontend-Layout.incomes.index', compact('incomes','income_khtotal','income_usdtotal'))->with('i');
    }

    public function CreateIncome()
    {
        return view('Frontend-Layout.incomes.create');
    }
    public function StoreIncome(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => '',
            'address' => '',
            'date_income' => '',
            'amount_usd' => '',
            'amount_riels' => '',
            'note' => '',

        ], [
            'name.required' => 'សូមបញ្ចូលឈ្មោះអ្នកចូលបច្ច័យ!',
        ]);

        Income::insert([
            'name' => $request->name,
            'gender' => $request->gender,
            'address' => $request->address,
            'date_income' => $request->date_income,
            'amount_usd' => $request->amount_usd,
            'amount_riels' => $request->amount_riels,
            'note' => $request->note,
        ]);

        //alert toast msg
        $notification = array(
            'message' => "Create Successfully",
            'alert-type' => 'success'
        );

        return redirect()->route('all.income')->with($notification);
    }

    public function IncomeEdit($id)
    {

        $income = Income::FindOrFail($id);
        return view('Frontend-Layout.incomes.edit', compact('income'));
    }
    public function IncomeUpdate(Request $request)
    {
        $income_id = $request->id;
        $request->validate([
            'name' => 'required',
            'gender' => '',
            'address' => '',
            'date_income' => '',
            'amount_usd' => '',
            'amount_riels' => '',
            'note' => '',
        ], [
            'name.required' => 'សូមបញ្ចូលឈ្មោះ!',
        ]);

        Income::FindOrFail($income_id)->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'address' => $request->address,
            'date_income' => $request->date_income,
            'amount_usd' => $request->amount_usd,
            'amount_riels' => $request->amount_riels,
            'note' => $request->note,
        ]);
        //alert toast msg
        $notification = array(
            'message' => "Updated Successfully!",
            'alert-type' => 'info'
        );
        return redirect()->route('all.income')->with($notification);
    }
    // Delete
    public function IncomeDelete($id)
    {
        $incomes = Income::findOrFail($id)->delete();
        //alert toast msg
        $notification = array(
            'message' => "Deleted Successfully",
            'alert-type' => 'success'
        );

        return redirect()->route('all.income')->with($notification);
    }
}
