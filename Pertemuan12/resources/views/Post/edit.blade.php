<x-layout>
    <h1>Edit Form</h1>
    <div class="content container mt-5">
        <div class="d-flex justify-content-center mb-5">
            <div class="card p-5" style="width: 50%">
                <form action="{{route('posts.update', $post)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')    
                    <div class="mb-3">
                        <img style="object-fit:cover; max-width:100%; height:auto; border-radius:10px" class="mb-2" src="{{asset('storage/' . $post->image)}}" alt="gambar">
                        <input type="file" class="form-control" name="image">
                        @error('image')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
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