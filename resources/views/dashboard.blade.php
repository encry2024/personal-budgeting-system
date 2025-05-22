@extends('template')

@section('header')
{{-- <x-header userName="{{ $userName }}" /> --}}
@endsection

@section('content')
<x-sidebar userName="{{ $userName }}"/>
<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
</div>
@endsection
