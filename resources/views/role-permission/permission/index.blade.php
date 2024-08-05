<div class="container">
    <div class="row">
        <div class="col">

        @if (session('status'))
        <div class="alert">{{session('status')}}</div>
        @endif
            <div class="card">
                <div class="card-header">
                    <h4>Permissions
                        <br>
                        <a href="{{ url('permissions/create') }}" class="btn">Add Permission</a>
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
    @foreach ($permissions as $permission)
<tr>
    <td>{{$permission->id}}</td>
    <td>{{$permission->name}}</td>
    <td>
<a href="{{ url('permissions/'.$permission->id.'/edit') }}" class="btn">Edit</a>
<a href="{{ url('permissions/'.$permission->id.'/delete') }}" class="btn">Delete</a>
    </td>
</tr>
    @endforeach
</tbody>


                </div>
            </div>
        </div>
    </div>
</div>




