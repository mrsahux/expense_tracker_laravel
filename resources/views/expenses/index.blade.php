@extends('layouts.app')

@section('content')

<h3 class="mb-4">Dashboard</h3>

<!-- MONTH FILTER -->
<form method="GET" action="{{ route('expenses.index') }}" class="row mb-4">
    <div class="col-md-4">
        <input
            type="month"
            name="month"
            value="{{ $month ?? '' }}"
            class="form-control"
        >
    </div>

    <div class="col-md-2">
        <button type="submit" class="btn btn-primary w-100">
            Filter
        </button>
    </div>

    <div class="col-md-2">
        <a href="{{ route('expenses.index') }}" class="btn btn-secondary w-100">
            Reset
        </a>
    </div>
</form>

<!-- STATS CARDS -->
<div class="row mb-4">

    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <h6 class="text-muted">Total Expense</h6>
                <h2 class="text-danger">₹ {{ $totalExpense }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <h6 class="text-muted">Total Entries</h6>
                <h2>{{ $totalCount }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0 bg-dark text-white">
            <div class="card-body text-center">
                <h6>Quick Action</h6>
                <a href="{{ route('expenses.create') }}"
                   class="btn btn-light btn-sm mt-2">
                    + Add Expense
                </a>
            </div>
        </div>
    </div>

</div>

<!-- EXPENSE TABLE -->
<div class="card shadow-sm border-0">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Expenses</h5>
        <a href="{{ route('expenses.create') }}" class="btn btn-primary btn-sm">
            Add Expense
        </a>
    </div>

    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Category</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Note</th>
                    <th width="150">Action</th>
                </tr>
            </thead>
            <tbody>

                @forelse($expenses as $expense)
                <tr>
                    <td>{{ $expense->category }}</td>
                    <td>₹ {{ $expense->amount }}</td>
                    <td>{{ $expense->expense_date }}</td>
                    <td>{{ $expense->note }}</td>
                    <td>
                        <a href="{{ route('expenses.edit', $expense->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('expenses.destroy', $expense->id) }}"
                              method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this expense?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted py-4">
                        No expenses found
                    </td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>

@endsection
