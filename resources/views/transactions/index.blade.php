@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Transaction List</h1>
        <a href="{{ route('transactions.create') }}" class="btn btn-success">Create</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Category</th>
                    <th>Notes</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->amount }}</td>
                        <td>{{ $transaction->type }}</td>
                        <td>{{ $transaction->category }}</td>
                        <td>{{ $transaction->notes }}</td>
                        <td>
                            <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
