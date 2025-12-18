<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();
        $month = $request->month;

        $query = Expense::where('user_id', $userId);

        if ($month) {
            $query->whereMonth('expense_date', date('m', strtotime($month)))
                  ->whereYear('expense_date', date('Y', strtotime($month)));
        }

        $expenses = $query->latest()->get();
        $totalExpense = $query->sum('amount');
        $totalCount = $query->count();

        return view('expenses.index', compact(
            'expenses',
            'totalExpense',
            'totalCount',
            'month'
        ));
    }

    public function create()
    {
        return view('expenses.create');
    }

    public function store(Request $request)
    {
        Expense::create([
            'user_id' => Auth::id(),
            'category' => $request->category,
            'amount' => $request->amount,
            'expense_date' => $request->expense_date,
            'note' => $request->note,
        ]);

        return redirect()->route('expenses.index');
    }

    public function edit(Expense $expense)
    {
        return view('expenses.edit', compact('expense'));
    }

    public function update(Request $request, Expense $expense)
    {
        $expense->update($request->only([
            'category','amount','expense_date','note'
        ]));

        return redirect()->route('expenses.index');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expenses.index');
    }
}
