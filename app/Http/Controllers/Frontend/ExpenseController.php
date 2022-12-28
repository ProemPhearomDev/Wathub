<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ExpenseController extends Controller
{
    // view
    public function ViewExpense()
    {
        $expenses = Expense::latest()->get();
        $expense_khtotal = DB::table('expenses')->sum('amounts_kh');
        $expense_usdtotal = DB::table('expenses')->sum('amounts_usd');
        return view('Frontend-Layout.expense.index', compact('expenses','expense_khtotal','expense_usdtotal'))->with('i');
    }

    public function CreateExpense()
    {
        return view('Frontend-Layout.expense.create');
    }
    public function StoreExpense(Request $request)
    {
        $request->validate(
            [
                'expense_name' => 'required',
                'date_expense' => '',
                'amounts_kh' => '',
                'amounts_usd' => '',
                'note' => '',
            ],
            [
                'expense_name.required' => 'សូមបញ្ចូលចំណាយលើអ្វីមួយ!',
            ]
        );

        Expense::insert([
            'expense_name' => $request->expense_name,
            'date_expense' => $request->date_expense,
            'amounts_kh' => $request->amounts_kh,
            'amounts_usd' => $request->amounts_usd,
            'note' => $request->note,
        ]);

        //alert toast msg
        $notification = array(
            'message' => "$request->expense_name Create Successfully",
            'alert-type' => 'success'
        );
        return redirect()->route('all.expense')->with($notification);
    }
    public function ExpenseEdit($id)
    {
        $expense = Expense::findOrfail($id);
        return view('Frontend-Layout.expense.edit', compact('expense'));
    }
    public function ExpenseUpdate(Request $request)
    {
        $expense_id = $request->id;
        $request->validate(
            [
                'expense_name' => 'required',
                'date_expense' => '',
                'amounts_kh' => '',
                'amounts_usd' => '',
                'note' => '',
            ],
            [
                'expense_name.required' => 'សូមបញ្ចូលចំណាយលើអ្វីមួយ!',
            ]
        );

        Expense::FindOrFail($expense_id)->update([
            'expense_name' => $request->expense_name,
            'date_expense' => $request->date_expense,
            'amounts_kh' => $request->amounts_kh,
            'amounts_usd' => $request->amounts_usd,
            'note' => $request->note,
        ]);
        //alert toast msg
        $notification = array(
            'message' => "Updated Successfully!",
            'alert-type' => 'info'
        );
        return redirect()->route('all.expense')->with($notification);
    }
    public function ExpenseDelete($id)
    {
        $expenses = Expense::find($id);
        $expenses->delete();
        //alert toast msg
        $notification = array(
            'message' => "Expense Deleted Successfully",
            'alert-type' => 'success'
        );
        return redirect()->route('all.expense')->with($notification);
    }
}
