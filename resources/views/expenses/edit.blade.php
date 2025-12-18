@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5>Edit Expense</h5>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('expenses.update', $expense->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Category</label>
                        <input type="text" name="category" class="form-control"
                               value="{{ $expense->category }}">
                    </div>

                    <div class="mb-3">
                        <label>Amount</label>
                        <input type="number" name="amount" class="form-control"
                               value="{{ $expense->amount }}">
                    </div>

                    <div class="mb-3">
                        <label>Date</label>
                        <input type="date" name="expense_date" class="form-control"
                               value="{{ $expense->expense_date }}">
                    </div>

                    <div class="mb-3">
                        <label>Note</label>
                        <textarea name="note" class="form-control">{{ $expense->note }}</textarea>
                    </div>

                    <button class="btn btn-primary w-100">
                        Update Expense
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
