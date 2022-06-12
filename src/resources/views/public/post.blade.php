@extends('layouts.web')

@include('public.components.popular')
@include('public.components.popular-categories')

@section('content')
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-6">
            <h1 class="text-2xl font-light text-gray-900">{{ $post->title }}</h1>
        </div>
        <div class="grid grid-cols-6 gap-10">
            <div class="col-span-12 sm:col-span-12 md:col-span-4 lg:col-span-4">
                <div class="max-w-2xl mx-auto pb-3 sm:pb-3 lg:pb-3 lg:max-w-none">
                    <div class="flex mb-4">
                        <div class="author text-sm text-gray-500 font-bold pr-2">By {{$post->user->name}}</div>
                        <div class="text-sm text-gray-500 pr-2">|</div>
                        <time class="author text-sm text-gray-500 pr-2">{{ $post->date }}</time>
                    </div>
                    <div class="image mb-5">
                        <img src="{{ $post->imageUrl }}" alt="{{ $post->title }}" class="w-full">
                    </div>
                    @if ($post->text)
                        <div class="text-container px-16">{!! $post->text !!}</div>
                    @elseif($post->description)
                        <div class="text-container px-16">{!! $post->description !!}</div>
                    @endif

                    <div class="categoeies px-16 pt-8">
                        <h2 class="text-gray-600 pb-1 mb-2 border-b border-gray-200">Categories</h2>
                        @foreach($post->categories as $category)
                            <div class="inline">
                                <a href="{{ route('category.show', ['slug' => $category->slug]) }}" class="text-sm text-gray-600 hover:text-blue-500 py-2 pr-2">
                                    {{ $category->title }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-12 md:col-span-2 lg:col-span-2">
                @yield('popular-posts')
                @yield('popular-categories')
            </div>
        </div>

    </main>
@endsection
