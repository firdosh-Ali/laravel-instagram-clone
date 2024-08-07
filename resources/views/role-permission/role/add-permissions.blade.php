<div class="container">
    <div class="row">
        <div class="col">

        @if (session('status'))
<div class="alert">{{ session('status') }}
        @endif

            <div class="card">
                <div class="card-header">
                    <h4>Role : {{ $role->name }}
                        <a href="{{ url('roles') }}" class="btn">Back</a>
</h4>
                    <div class="card-body">    
                    <form action="{{ url('roles/'.$role->id.'/give-permissions') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            @error('permission')
                            <span class="text">{{ $message }}
                            @enderror
                            <label for="">Permissions</label>

                            <div class="row">
                                @foreach ($permissions as $permission)
                                <div class="col">

                                <label>
                                <input
                                 type="checkbox" 
                                 name="permission[]" 
                                 value="{{ $permission->name }}"
                             {{ in_array($permission->id , $rolePermissions) ? 'checked':'' }}
                        
                                 >
                                {{$permission->name}}
                          </label>
                                </div>
                                @endforeach
</div>
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





