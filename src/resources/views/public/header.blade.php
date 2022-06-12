@section('header')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex justify-between items-center">
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="">
                        <span class="logo">
                          <span class="first">Feed</span>
                          <span class="second">Hacker</span>
                        </span>
                    </a>
                </div>
                <div class="">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="{{ route('post.index') }}" class="px-3 py-2 text-lg font-medium">Posts</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
