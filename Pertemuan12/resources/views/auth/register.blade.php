<x-layout>
    <div class="content container mt-5">
        <h1>Register Form</h1>
    
        <div class="d-flex justify-conten-center">
            <div class="card p-5" style="width: 50%">
                <form action="{{route('register')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fs-4">Name</label>
                        <input type="text" class="form-control" name="name">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fs-4">Email</label>
                        <input type="email" class="form-control" name="email">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fs-4">Password</label>
                        <input type="password" class="form-control" name="password">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fs-4">Password Confirmation</label>
                        <input type="password" class="form-control" name="password_confirmation">
                        @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <button class="btn btn-dark" type="submit"> Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>