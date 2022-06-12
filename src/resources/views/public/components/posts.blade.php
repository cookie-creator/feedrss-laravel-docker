@section('posts')
    <div class="lg:space-y-0 grid grid-cols-1 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 md:gap-x-2 lg:gap-x-6 gap-y-5">
        @foreach ($posts as $post)
            <div class="group relative">
                <div class="relative w-full h-80 bg-white rounded-md overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                    <img src="{{ $post->imageUrl }}" alt="{{ $post->title }}" class="w-full h-full object-center object-cover" />
                </div>
                <h3 class="mt-6 text-sm text-gray-900 pb-1">
                    <a href="{{ route('post.show', ['slug' => $post->slug]) }}" class="text-sm text-gray-800 hover:text-blue-500 py-2">
                        <span class="absolute inset-0"></span>
                        {{ $post->title }}
                    </a>
                </h3>
                <p class="text-gray-400 text-sm mb-3">{{ $post->date }}</p>
                <p class="text-sm text-gray-500 ">
                    {!! $post->description !!}
                </p>
            </div>
        @endforeach
    </div>
@endsection
