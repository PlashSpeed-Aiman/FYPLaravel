@extends('layout')
@section('content')
    <section class="flex bg-dashboard font-['Poppins']">
        <div class="w-full min-h-screen flex flex-col font-['Poppins']">
            <div class="flex justify-end">
                @include('lawyer.user_dropdown')
            </div>
            <h1 class="text-xl font-bold mx-10">Lawyer Panel</h1>
            <section class="my-5 mx-10  rounded ">
                <table class="table bg-white">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Client Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                    </tr>
                    </thead>

                    <tbody>
                    @if($clients->isEmpty())
                        <tr>
                            <td colspan="4">No clients found</td>
                        </tr>
                    @else
                    @foreach($clients as $client)
                        <tr>
                            <td><a class="text-blue-600 hover:underline " href="{{url('lawyer/clients/'.$client->id)}}">{{ $client->id }}</a></td>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->phone }}</td>
                            <td>{{ $client->email }}</td>
                        </tr>
                    @endforeach
                    @endif
                    </tbody>

                </table>

            </section>
            </div>
    </section>

@endsection
