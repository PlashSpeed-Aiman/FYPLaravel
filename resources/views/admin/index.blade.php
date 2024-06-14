@extends('layout')
@section('content')
    <section class="flex bg-dashboard font-['Poppins']">
        @include('navbar')
        <div class="w-full min-h-screen flex flex-col font-['Poppins']">
            <div class="flex justify-end">
                @include('admin.user_dropdown')
            </div>
            <h1 class="text-xl font-bold mx-10">Admin Panel</h1>
            <div class="flex xs:sm:flex-col gap-2 mx-10 my-5  ">
                <div class="flex flex-col flex-1">
                    <label class="font-bold mb-2 mx-1">Customer</label>
                    <input class="input border border-zinc-200">
                </div>
                <div class="flex flex-col flex-1">
                    <label class="font-bold mb-2 mx-1">Phone Number</label>
                    <input class="input border border-zinc-200">
                </div>
                <div class="flex flex-col flex-1">
                    <label class="font-bold mb-2 mx-1">Start Date</label>
                    <input class="input border border-zinc-200">
                </div>
                <div class="flex flex-col flex-1">
                    <label class="font-bold mb-2 mx-1">End Date</label>
                    <input class="input border border-zinc-200">
                </div>
            </div>
            <div class="flex  mx-10  gap-5">
                <button class="btn bg-zinc-500 text-white">Search</button>
                <button class="btn bg-zinc-500 text-white">Reset</button>
            </div>
            <div class="mx-5 my-5">
                <table class="table bg-white">
                    <thead>
                    <tr>
                        <th>Case ID</th>
                        <th>Date</th>
                        <th>Case Status</th>
                        <th>Handler</th>
                        <th>Paid Amount</th>
                        <th>Amount Due</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cases as $case)
                        <tr>
                            <td><a class="text-blue-600 hover:underline " href="{{url('admin/cases/' . $case->id )}}">{{$case->case_number}}</a></td>
                            <td>{{$case->date}}</td>
                            <td>{{$case->case_status}}</td>
                            <td>1234567890</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </section>

@endsection
