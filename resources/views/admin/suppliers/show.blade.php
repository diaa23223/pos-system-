@extends('layouts.master')

@section('title')

@endsection
@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
       
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>{{ __('name') }}:</strong> {{ $permission->name }}</p>
                    <p><strong>{{ __('display_name') }}:</strong> {{ $permission->display_name }}</p>
                </div>
    
            <h4 class="mt-4">{{ __('Products') }}</h4>
            @if($order->orderItems->isNotEmpty())
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>{{ __('Product') }}</th>
                                <th>{{ __('Quantity') }}</th>
                                <th>{{ __('Price') }}</th>
                                <th>{{ __('Subtotal') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->orderItems as $item)
                                <tr>
                                    <td>{{ $item->product->name ?? __('N/A') }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ number_format($item->price, 2) }} {{ __('EGP') }}</td>
                                    <td>{{ number_format($item->price * $item->quantity, 2) }} {{ __('EGP') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-muted">{{ __('No products in this order') }}</p>
            @endif

            <div class="mt-4">
                <a href="{{ route('orders.index') }}" class="btn btn-secondary">{{ __('Back to Orders') }}</a>
                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning">{{ __('Edit Order') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection