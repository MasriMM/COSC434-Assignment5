@extends('layout')
@section('title', 'Add Student')
@section('content')
<h2>Add New Student</h2>
<form method="POST" action="{{ route('students.store') }}" class="mt-3">
    @csrf
    <input type="text" class="form-control mt-3" name="name" id="name" placeholder="Search student...">
    <input type="number" class="form-control mt-3" name="age" id="age" placeholder="Enter age...">

    <!-- TODO: Add form fields for name and age -->
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>
@endsection
