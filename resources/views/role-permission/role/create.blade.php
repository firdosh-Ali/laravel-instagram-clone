<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create Role
                        <br>
                        <a href="{{ url('roles') }}" class="btn">Back</a>
</h4>
                    <div class="card-body">    

                    <form action="{{ url('roles') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="">Role Name</label>
                            <input type="text" name="name" class="form-control" >
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




