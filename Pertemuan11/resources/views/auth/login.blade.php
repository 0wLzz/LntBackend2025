<x-layout>
    <div class="content container mt-5">
        @error('login')
            <div class="alert">{{$message}}</div>
        @enderror
        <h1>Login Form</h1>
        <form action=" {{route('login')}}" method="POST">
            <div class="d-flex justify-content-center">
                <div class="card p-5" style="width: 50%">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fs-4">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        
                        <div class="mb-3">
                            <label class="form-label fs-4">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        @error('paswword')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        
                        <button class="btn btn-dark" type="submit">Submit</button>
                    </div>
                </div>
        </form>
    </div>
</x-layout>