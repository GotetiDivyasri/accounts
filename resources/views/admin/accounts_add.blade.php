@extends('layouts.partials.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container">
    <h2 class="mb-4">{{ $account ? 'Edit Transactions' : 'Add Transactions' }}</h2>

    <form action="{{ $account ? route('admin.accounts_update', $account->id) : route('admin.accounts_store') }}" method="POST">
        @csrf
        @if($account)
            {{-- For update, use POST or PUT method --}}
        @endif

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="transaction_date" class="form-label">Date</label>
                <input type="date" name="transaction_date" id="transaction_date" class="form-control"
                    value="{{ $account ? $account->transaction_date : old('transaction_date') }}" required>
            </div>
            <div class="col-md-4">
                <label for="present_amount" class="form-label">Present Amount</label>
                <input type="number" name="present_amount" id="present_amount" class="form-control" placeholder="Enter current amount"
                    value="{{ $account ? $account->present_amount : old('present_amount') }}" required>
            </div>
        </div>

        <h5>Transaction Entries</h5>
        <table class="table table-bordered" id="transactions_table">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="transaction_rows">
                @if($account && $account->transactions)
                    @foreach($account->transactions as $i => $txn)
                        <tr>
                            <td>
                                <select name="transactions[{{ $i }}][type]" class="form-control" required>
                                    <option value="">Select</option>
                                    <option value="Credit" {{ $txn->type == 'Credit' ? 'selected' : '' }}>Credit</option>
                                    <option value="Debit" {{ $txn->type == 'Debit' ? 'selected' : '' }}>Debit</option>
                                </select>
                            </td>
                            <td>
                                <input type="number" name="transactions[{{ $i }}][amount]" class="form-control" value="{{ $txn->amount }}" required>
                            </td>
                            <td>
                                <input type="text" name="transactions[{{ $i }}][description]" class="form-control" value="{{ $txn->description }}" required>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-danger remove-row">Remove</button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>
                            <select name="transactions[0][type]" class="form-control" required>
                                <option value="">Select</option>
                                <option value="Credit">Credit</option>
                                <option value="Debit">Debit</option>
                            </select>
                        </td>
                        <td>
                            <input type="number" name="transactions[0][amount]" class="form-control" placeholder="Amount" required>
                        </td>
                        <td>
                            <input type="text" name="transactions[0][description]" class="form-control" placeholder="Description" required>
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-danger remove-row">Remove</button>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>

        <button type="button" class="btn btn-secondary mb-3" id="add_row">Add Row</button>

        <div>
            <button type="submit" class="btn btn-primary">{{ $account ? 'Update Transactions' : 'Submit Transactions' }}</button>
        </div>
    </form>
</div>

<style>
    th, td { vertical-align: middle; }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let rowIndex = {{ $account && $account->transactions ? count($account->transactions) : 1 }};

    $('#add_row').click(function() {
        const newRow = `
            <tr>
                <td>
                    <select name="transactions[${rowIndex}][type]" class="form-control" required>
                        <option value="">Select</option>
                        <option value="Credit">Credit</option>
                        <option value="Debit">Debit</option>
                    </select>
                </td>
                <td>
                    <input type="number" name="transactions[${rowIndex}][amount]" class="form-control" required>
                </td>
                <td>
                    <input type="text" name="transactions[${rowIndex}][description]" class="form-control" required>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-danger remove-row">Remove</button>
                </td>
            </tr>
        `;
        $('#transaction_rows').append(newRow);
        rowIndex++;
    });

    $(document).on('click', '.remove-row', function() {
        $(this).closest('tr').remove();
    });
</script>
@endsection
