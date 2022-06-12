@section('popular-posts')
    <div>
        <h2 class="text-gray-600 pb-1 mb-4 border-b border-gray-200">Popular</h2>
        <div class="pb-6 grid grid-cols-2 lg:grid-cols-2 md:grid-cols-1 sm:grid-cols-2 md:gap-x-2 sm:gap-x-2 lg:gap-x-6 gap-y-5">
            @foreach($popularPosts as $post)
                <div class="group relative pb-4">
                    <div class="relative w-full h-40 bg-white rounded-md overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-40 lg:aspect-w-1 lg:aspect-h-1">
                        <img src="{{ $post->imageUrl }}" alt="{{ $post->title }}" class="w-full h-full object-center object-cover" />
                    </div>
                    <h3 class="mt-2 text-sm text-gray-900 pb-2">
                        <a href="{{ route('post.show', ['slug' => $post->slug]) }}" class="text-sm text-gray-600 hover:text-blue-500 py-2">
                            <span class="absolute inset-0"></span>
                            {{ $post->title }}
                        </a>
                    </h3>
                </div>
            @endforeach
        </div>
    </div>
@endsection
