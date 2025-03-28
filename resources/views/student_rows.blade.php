@if($students->isEmpty())
<tr>
    <td colspan="3" class="text-center">No students Found</td>
</tr>
@endif
@foreach ($students as $student)
    <tr>
        <td>{{$student->name}}</td>
        <td>{{$student->age}}</td>
        <td>
            <a href="{{route('students.show', $student->id)}}" class="btn btn-success btn-sm">Show</a>
            <a href="{{route('students.edit', $student->id)}}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{route('students.destroy', $student->id)}}" method="POST">
                @csrf
                @method('Delete')
                <button type="submit" class="btn btn-danger btn-sm mt-2">Delete</button>
            </form>

        </td>
    </tr>
@endforeach
