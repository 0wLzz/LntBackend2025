<x-layout>
    <h1>Edit Form</h1>
    <div class="content container mt-5">
        <div class="d-flex justify-content-center mb-5">
            <div class="card p-5" style="width: 50%">
                <form action="{{route('posts.update', $post)}}" method="POST">
                    @csrf
                    @method('PUT')    
                    <div class="mb-3">
                        <label class="form-label fs-4">Title</label>
                        <input value={{$post->title}} type="text" class="form-control" name="title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fs-4">Body</label>
                        <br>
                        <textarea name="body">{{$post->body}}</textarea>
                    </div>
                    
                    <button class="btn btn-dark" type="submit"> Submit</button>
                </form>
            </div>
    
        </div>
    </div>

</x-layout>