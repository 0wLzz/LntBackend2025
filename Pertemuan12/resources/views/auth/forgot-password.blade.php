<x-layout>
    <div class="content container mt-5">
        @error('login')
            <div class="alert">{{$message}}</div>
        @enderror
        <h1>Request Forget Password</h1>
        <form action="{{route('password.email')}}" method="POST">
            <div class="d-flex justify-content-center">
                <div class="card p-5" style="width: 50%">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fs-4">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        
                        <button class="btn btn-dark" type="submit">Submit</button>
                    </div>
                </div>
        </form>
    </div>
</x-layout>