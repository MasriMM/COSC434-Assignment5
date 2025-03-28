
@extends('layout')
@section('title', 'Students')
@section('content')
<h2>Students</h2>
<!-- TODO: Add search bar here -->
<div class="mb-3 mt-3">
    <input type="text" class="form-control" id="search" placeholder="Search student...">
</div>

<!-- Filter by age -->
<div class="mb-3 mt-3 row">
    <div class="col-auto">
        <label for="minAge" class="form-label">Enter minimum age:</label>
        <input type="number" class="form-control" id="minAge">
    </div>
    <div class="col-auto">
        <label for="max" class="form-label">Enter maximum age:</label>
        <input type="number" class="form-control" id="maxAge">
    </div>
</div>

<table class="table mt-3">
    <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="student-table">
        <!-- TODO: Display student list here -->
        @include('student_rows')
    </tbody>
</table>

<!-- TODO: Add jQuery AJAX logic -->
<script src="{{ asset('js/student.js') }}"></script>
@endsection