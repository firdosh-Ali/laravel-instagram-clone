<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create Employees
                        <br>
                        <a href="{{ url('employees') }}" class="btn">Back</a>
</h4>
                    <div class="card-body">    

                    <form action="{{ url('employees') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" >
                        </div>

                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" >
                        </div>

                        <div class="mb-3">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" >
                        </div>

                        
                        <div class="mb-3">
                            <label for="">Roles</label>
                            <select name="roles[]" class="form-control" multiple>
                                <option value="">Select Role</option>
                                @foreach ($roles as $role)
                                <option value="{{ $role }}">{{ $role }}</option>
                                @endforeach
</select>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn">Save</button>
                        </div>
</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




