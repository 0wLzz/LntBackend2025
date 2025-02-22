<x-layout>
    <h1>Login Form</h1>

    <div class="d-flex justify-conten-center">
        <div class="card p-5" style="width: 50%">
                <form action=" {{route('login')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fs-4">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label class="form-label fs-4">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                
                <button class="btn btn-dark" type="submit"> Submit</button>
            </form>
        </div>

    </div>
</x-layout>