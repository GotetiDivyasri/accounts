@extends('layouts.partials.admin')

@section('title','Admin Dashboard')

@section('content')
<div class="container">
    <h2>Account Details: {{ \Carbon\Carbon::parse($account->transaction_date)->format('d-m-Y') }}</h2>

    <p><strong>Present Amount:</strong> {{ $account->present_amount }}</p>

    <h5 class="mt-4">Transactions:</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Type</th>
                <th>Amount</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($account->transactions as $txn)
                <tr>
                    <td>{{ $txn->type }}</td>
                    <td>{{ $txn->amount }}</td>
                    <td>{{ $txn->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('accounts.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
