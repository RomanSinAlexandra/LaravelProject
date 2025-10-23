@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card-body">
        <p class="fs-5 mb-4 text-white">
            Ласкаво просимо, <strong>{{ Auth::user()->name }}</strong>!
        </p>

        <div class="list-group">
            <a href="{{ route('admin.products') }}" 
               class="card h-100 text-white border-0 mt-4 align-items-center list-group-item d-flex">
                <span>Товари</span>
            </a>

            <a href="{{ route('admin.users') }}" 
               class="card h-100 text-white border-0 mt-4 align-items-center list-group-item d-flex">
                <span>Користувачі</span>
            </a>
        </div>
    </div>

    <div class="card-footer text-center mt-4">
        <a href="{{ route('home') }}" class="btn btn-warhammer">
            Повернутись до магазину
        </a>
    </div>
</div>
@endsection
