@extends('layout')
@section('content')
<section class="max-w-3xl mx-auto">
    <div id="navbar" class="my-5">
        <ul class="flex gap-1 justify-between">
            <li><a href="/" class="text-3xl font-[Poppins]">Zarkasya & Co.</a></li>
            <div class="flex gap-3 justify-center items-center">
                <li class="font-bold"><a href="{{ url('/') }}">Home</a></li>
                @if(!Auth::check())
                <li class="font-bold"><a href="{{ url('/login') }}">Login</a></li>
                @else
                <li class="font-bold"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="font-bold"><a href="{{ url('/logout') }}">Logout</a></li>

                @endif
            </div>
           </ul>
    </div>
    <hr>
    <div id="content" class="h-64">

    </div>
</section>
@endsection
