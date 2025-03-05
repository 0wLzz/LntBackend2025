<x-layout>
    <!-- Main Content -->
    <div class="content container mt-5">
        <div class="d-flex justify-content-between mb-3">
            <h1>Welcome Page</h1>
            <a href="{{route('posts.create')}}" class="btn btn-dark" type="submit">Add Post</a>
        </div>
        <div class="row row-cols-md-4 g-4 mb-3">
            @foreach ($posts as $post)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Posted {{$post->created_at}} by <span class="text-primary">USER</span></h6>
                            <p class="card-text">{{$post->body}}</p>
                            <a href="{{route('posts.edit', $post)}}" class="btn btn-dark">Edit</a>

                            <form action="{{route('posts.destroy', $post)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>