@extends('layouts.partials.admin')

@section('title','Admin Dashboard')
@section('content')
<div class="container">
    <h2 class="mb-4">Accounts List</h2>

    <div class="mb-3 text-end">
        <a href="{{ route('accounts.create') }}" class="btn btn-success">+ Add Account</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Date</th>
                <th>Present Amount</th>
                <th>Total Transactions</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($accounts as $account)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($account->transaction_date)->format('d-m-Y') }}</td>
                    <td>{{ $account->present_amount }}</td>
                    <td>{{ count($account->transactions ?? []) }}</td>
                    <td>
                        <a href="{{ route('accounts.edit', $account->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ route('accounts.destroy', $account->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                        <a href="{{ route('accounts.show', $account->id) }}" class="btn btn-info btn-sm">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection