@extends('layout')
@section('content')
<section class="max-w-3xl mx-auto">
    <div id="navbar" class="my-5">
        <ul class="flex gap-1 justify-between">
            <li><a href="/" class="text-3xl font-[Poppins]">Zarkasya & Co.</a></li>
            <section class="flex gap-3 justify-center items-center">
                <li class="font-bold"><a href="{{ url('/') }}">Home</a></li>
                @if(!Auth::check())
                <li class="font-bold"><a href="{{ url('/login') }}">Login</a></li>
                @else
                <li class="font-bold"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="font-bold"><a href="{{ url('/logout') }}">Logout</a></li>

                @endif
            </section>
           </ul>
    </div>
    <hr>
    <div id="content" class="h-64">
        <h1 class="text-3xl font-bold">Welcome to Zarkasya & Co.</h1>
        <p class="my-5">Zarkasya & Co. is a company that provides services in the field of accounting and tax consulting. We are here to help you manage your finances and taxes. We have a team of experts who are ready to help you. We are committed to providing the best service to our clients. We are here to help you manage your finances and taxes. We have a team of experts who are ready to help you. We are committed to providing the best service to our clients.</p>
        <a href="{{ url('/login') }}" class="btn">Get Started</a>

    </div>
</section>
@endsection
