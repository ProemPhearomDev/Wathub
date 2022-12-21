<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Expense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExpenseController extends Controller
{
    // view
    public function ViewExpense()
    {
        $expenses = Expense::latest()->get();
        return view('Frontend-Layout.expense.index', compact('expenses'))->with('i');
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
                'amounts' => 'required',
                'note' => '',
            ],
            [
                'expense_name.required' => 'សូមបញ្ចូលចំណាយលើអ្វីមួយ!',
            ]
        );

        Expense::insert([
            'expense_name' => $request->expense_name,
            'date_expense' => $request->date_expense,
            'amounts' => $request->amounts,
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
                'amounts' => 'required',
                'note' => '',
            ],
            [
                'expense_name.required' => 'សូមបញ្ចូលចំណាយលើអ្វីមួយ!',
            ]
        );

        Expense::FindOrFail($expense_id)->update([
            'expense_name' => $request->expense_name,
            'date_expense' => $request->date_expense,
            'amounts' => $request->amounts,
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
        $expenses = Expense::find($id)->delete();
        //alert toast msg
        $notification = array(
            'message' => "Expense Deleted Successfully",
            'alert-type' => 'success'
        );
        return redirect()->route('all.expense')->with($notification);
    }
}
