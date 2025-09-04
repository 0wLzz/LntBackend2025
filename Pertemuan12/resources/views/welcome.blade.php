<x-layout>
    <!-- Main Content -->
    <div class="content container mt-5">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1>Welcome Page</h1>
            @auth
            <a href="{{route('posts.create')}}" class="btn btn-dark" type="submit">Add Post</a>
            @endauth
        </div>
        <div class="row row-cols-md-4 g-4 mb-3">
            @foreach ($posts as $post)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            @if ($post->image != null)
                                <img style="object-fit:cover; max-width:100%; height:auto; border-radius:10px" class="mb-2" src="{{asset('storage/' . $post->image)}}" alt="gambar">
                            @else
                                <img style="object-fit:cover; max-width:100%; height:auto; border-radius:10px" class="mb-2" src="{{asset('storage/image/images.jpeg')}}" alt="gambar">
                            @endif
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Posted {{$post->created_at->diffForHumans()}} by <span class="text-primary">{{$post->user->name}}</span></h6>
                            <p class="card-text">{{Str::words($post->body, 10)}}</p>

                            <a href="{{route('posts.show', $post)}}" class="text-primary">Read More...</a>
                            @auth
                                <div class="d-flex justify-content-between">
                                    <a href="{{route('posts.edit', $post)}}" class="btn btn-dark">Edit</a>
        
                                    <form action="{{route('posts.destroy', $post)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{$posts->links()}}
    </div>
</x-layout>