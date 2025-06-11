@extends('layouts.master')

@section('title', __('suppliers'))

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>{{ __('suppliers list') }}</h4>
        <a href="{{ route('suppliers.create') }}" class="btn btn-primary">{{ __('create supplier') }}</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>{{ __('supplier name') }}</th>
                        <th>{{ __('supplier email') }}</th>
                        <th>{{ __('supplier phone') }}</th>
                        <th>{{ __('supplier company') }}</th>
                        <th>{{ __('actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($suppliers as $supplier)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $supplier->name }}</td>
                            <td>{{ $supplier->email }}</td>
                            <td>{{ $supplier->phone }}</td>
                            <td>{{ $supplier->company_name }}</td>
                            <td>
                                <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-sm btn-outline-warning">{{ __('buttons_edit') }}</a>
                                <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">{{ __('buttons_delete') }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
