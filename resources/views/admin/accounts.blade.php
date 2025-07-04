@extends('layouts.partials.admin')

@section('title','Admin Dashboard')
@section('content')
<main>
<div class="container-fluid px-4">
    <h1 class="mt-4">Accounts</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Accounts</li>
    </ol>
    <div class="card mb-4">
        {{-- <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div> --}} 
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                    </tr>
                </tbody> 
            </table>
        </div>
    </div>
</div>
</main>
@endsection 