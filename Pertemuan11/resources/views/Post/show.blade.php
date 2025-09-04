<x-layout>
    <div class="content container mt-5">
        <h1>Post</h1>
        <div class="content container mt-5">
            <div class="d-flex justify-content-center mb-5">
                <div class="card p-5" style="width: 50%">
                    <div class="mb-3">
                        <label class="form-label fs-4">Title</label>
                        <p type="text" name="title">{{$post->title}}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fs-4">Body</label>
                        <br>
                        <a name="body">{{$post->body}}</a>
                    </div>
                    
                    <a href="{{route('posts.index')}}" class="btn btn-dark" type="submit"> Back</a>
                </div>
            </div>
        </div>
    </div>

</x-layout>