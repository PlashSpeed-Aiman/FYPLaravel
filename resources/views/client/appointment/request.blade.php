@extends('layout')
@section('content')
    <section class="flex bg-dashboard font-['Poppins']">
        @include('client.navbar')
        <div class="w-full min-h-screen flex flex-col font-['Poppins']">
            <div class="flex justify-end">
                {{--    Profile Pic, might put dropdown for logout            --}}
                @include('client.user_dropdown')
            </div>
            <h1 class="text-xl font-bold mx-10">Appointment Booking</h1>
            <p class="my-3 mx-10">Book your appointments and have them reviewed by the admin</p>
            <form target="_blank" method="post" action="{{route('client.appointment.store')}}" class="my-3 w-full flex flex-col gap-2">
                @csrf {{ csrf_field() }}
                <h1 class="text-lg  mx-12">Date</h1>
                <input name="date" type="date" class="input border border-zinc-200 mx-10">
                <h1 class="text-lg  mx-12">Time</h1>
                <input name="time" type="time" class="input border border-zinc-200 mx-10">
                <h1 class="text-lg  mx-12">Reason</h1>
                <textarea name="reason" class="input border border-zinc-200 mx-10 py-2"></textarea>
                <input type="submit" class="btn border border-slate-200 bg-blue-900  ml-auto mr-10" value="Request">
            </form>


        </div>
    </section>

@endsection






