<x-layout>
    @session('message')
        <div class="alert">{{$message}}</div>
    @endsession

    <div class="content container mt-5">
        <form action="{{route('verification.send')}}" method="POST">
            <div class="d-flex justify-content-center">
                <div class="card p-5" style="width: 50%">
                    <h1>We have sent you an Email, please verify your email</h1>
                    @csrf
                    <button class="btn btn-dark" type="submit">Resend Email</button>
                </div>
            </div>
        </form>
    </div>
</x-layout>