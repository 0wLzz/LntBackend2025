<x-layout>
    <h1>Insert Form</h1>

    <div class="d-flex justify-content-center mb-5">
        <div class="card p-5" style="width: 50%">
                <form action="{{route('posts.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fs-4">Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="mb-3">
                    <label class="form-label fs-4">Body</label>
                    <br>
                    <textarea name="body"></textarea>
                </div>
                
                <button class="btn btn-dark" type="submit"> Submit</button>
            </form>
        </div>

    </div>
</x-layout>