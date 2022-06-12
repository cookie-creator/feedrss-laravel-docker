@section('popular-categories')
<div>
    <h2 class="text-gray-600 pb-1 mb-4 border-b border-gray-200">Popular categories</h2>
    @foreach($categories as $category)
        <div class="group relative pb-1">
            <a href="{{ route('category.show', ['slug' => $category->slug]) }}" class="text-sm text-gray-600 hover:text-blue-500 py-2">
                {{ $category->title }}
            </a>
        </div>
    @endforeach
</div>
@endsection
