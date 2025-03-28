@extends('layout')
@section('title', 'Home')
@section('content')
<h1 class="text-center">Welcome to Laravel Kickstart</h1>
<div class="text-center mt-4">
    <!-- TODO: Add buttons to view/add students -->
    <a href="{{ route('students.index') }}" class="btn btn-info btn-sm hover:bg-blue-600 transition p-3">View Students</a>
    <a href="{{ route('students.create') }}" class="btn btn-info btn-sm hover:bg-blue-600 transition p-3">Add Students</a> 
</div>
@endsection