@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Kategori')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Kategori')

@section('content')
<div class="container">

    @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
    @endif

    <div class="card">
        {{-- <div class="card-header">Manage Kategori</div> --}}
        <div class="card-header d-flex align-items-center">
            <h3 class="card-title">Manage Kategori</h3>
            <a href="{{ url('/kategori/create') }}" class="btn btn-primary ml-auto">
                Add New
            </a>
        </div>
        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div>
</div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
