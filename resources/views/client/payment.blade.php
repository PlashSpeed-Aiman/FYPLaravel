@extends('layout')
@section('content')
    <section class="flex bg-dashboard font-['Poppins']">
        @include('client.navbar')
        <div class="w-full min-h-screen flex flex-col font-['Poppins']">
            <div class="flex justify-end">
                {{--    Profile Pic, might put dropdown for logout    --}}        --}}
                @include('client.user_dropdown')
            </div>
{{-- PAGE CONTENT--}}
            <section>
                <h1 class="text-xl font-bold mx-10">Payment</h1>
                <p class="my-3 mx-10 ">View your invoices for rendered services</p>
                <div class="mx-5">
                    <table class="table bg-white">
                        <thead>
                        <tr>
                            <th>Invoice ID</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </section>


        </div>
    </section>
@endsection
