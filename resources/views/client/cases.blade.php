@extends('layout')
@section('content')
    <section class="flex bg-dashboard font-['Poppins']">
        @include('client.navbar')
        <div class="w-full min-h-screen flex flex-col font-['Poppins']">
            <div class="flex justify-end">
                {{--    Profile Pic, might put dropdown for logout            --}}
                @include('client.user_dropdown')

            </div>
            <h1 class="text-xl font-bold mx-10">Cases</h1>
            <p class="my-3 mx-10">View your cases to see the progress, remarks, etc</p>
            <div class="mx-9 my-2">
                <table class="table bg-white">
                    <thead>
                    <tr>
                        <th>Case ID</th>
                        <th>Date</th>
                        <th>Case Status</th>
                        <th>Handler</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cases as $case)
                        <tr>
                            <td><a class="text-blue-600 hover:underline " href="{{url('client/cases/' . $case->id )}}">{{$case->case_number}}</a></td>
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
