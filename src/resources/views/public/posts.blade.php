@extends('layouts.web')

@include('public.components.posts')
@include('public.components.popular')
@include('public.components.popular-categories')

@section('content')
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-6">
            <h1 class="text-2xl font-light text-gray-900">LifeFeeder Posts</h1>
        </div>
        <div class="grid grid-cols-6 gap-10">
            <div class="col-span-12 sm:col-span-12 md:col-span-4 lg:col-span-4">
                <div class="max-w-2xl mx-auto pb-3 sm:pb-3 lg:pb-3 lg:max-w-none">
                    @yield('posts')
                </div>
                {{ $posts->links() }}
            </div>
            <div class="col-span-12 sm:col-span-12 md:col-span-2 lg:col-span-2">
                @yield('popular-posts')
                @yield('popular-categories')
            </div>
        </div>
    </main>
@endsection
