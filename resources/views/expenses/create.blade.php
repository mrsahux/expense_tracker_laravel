@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5>Add Expense</h5>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('expenses.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label>Category</label>
                        <input type="text" name="category" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Amount</label>
                        <input type="number" name="amount" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Date</label>
                        <input type="date" name="expense_date" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Note</label>
                        <textarea name="note" class="form-control"></textarea>
                    </div>

                    <button class="btn btn-success w-100">
                        Save Expense
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
