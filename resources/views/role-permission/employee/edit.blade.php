<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Employees
                        <br>
                        <a href="{{ url('employees') }}" class="btn">Back</a>
</h4>
                    <div class="card-body">    

                    <form action="{{ url('employees/'.$employee->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" readonly value="{{ $employee->name}}" class="form-control" >
                            @error('name') <span class="text">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" value="{{ $employee->email}}" class="form-control" >
            
                        </div>

                        <div class="mb-3">
                            <label for="">Password</label>
                            <input type="password" name="password"  class="form-control" >
                            @error('password') <span class="text">{{ $message }}</span>@enderror
                        </div>

                        
                        <div class="mb-3">
                            <label for="">Roles</label>
                            <select name="roles[]" class="form-control" multiple>
                                <option value="">Select Role</option>
                                @foreach ($roles as $role)
                                <option 
                                value="{{ $role }}" {{ in_array($role, $employeeRoles) ? 'selected':''}} >
                                {{ $role }}</option>
                                @endforeach
</select>
@error('roles') <span class="text">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn">Update</button>
                        </div>
</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




