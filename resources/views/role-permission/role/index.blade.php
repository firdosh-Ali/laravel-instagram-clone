
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
                    <h4>Roles
                        <br>
                        <a href="{{ url('roles/create') }}" class="btn">Add Role</a>
</h4>
                    <div class="card-body"></div>

                    <table class="table" style="border: 1px solid #ddd; width:80%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
</tr>
</thead>
<tbody>
    @foreach ($roles as $role)
<tr>
    <td>{{$role->id}}</td>
    <td>{{$role->name}}</td>
    <td>
<a href="{{ url('roles/'.$role->id.'/give-permissions') }}" class="btn">Add / Edit Role Permission</a>
<a href="{{ url('roles/'.$role->id.'/edit') }}" class="btn">Edit</a>
<a href="{{ url('roles/'.$role->id.'/delete') }}" class="btn">Delete</a>
    </td>
</tr>
    @endforeach
</tbody>

                </div>
            </div>
        </div>
    </div>
</div>




