
@include('role-permission.navlinks')
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col">

        @if (session('status'))
        <div class="alert">{{session('status')}}</div>
        @endif
            <div class="card">
                <div class="card-header">
                    <h4>Employees
                        <br>
                        <a href="{{ url('employees/create') }}" class="btn">Add Employees</a>
</h4>
                    <div class="card-body"></div>

                    <table class="table" style="border: 1px solid #ddd; width:80%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
</tr>
</thead>
<tbody>
    @foreach ($employees as $employee)
<tr>
    <td>{{$employee->id}}</td>
    <td>{{$employee->name}}</td>
    <td>{{$employee->email}}</td>
    <td>
<a href="{{ url('employees/'.$employee->id.'/edit') }}" class="btn">Edit</a>
<a href="{{ url('employees/'.$employee->id.'/delete') }}" class="btn">Delete</a>
    </td>
</tr>
    @endforeach
</tbody>

                </div>
            </div>
        </div>
    </div>
</div>




