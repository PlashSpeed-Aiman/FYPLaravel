@extends('layout')
@section('content')
    <section class="flex bg-dashboard font-['Poppins']">
        @include('navbar')
        <div class="w-full min-h-screen flex flex-col font-['Poppins']">
            <div class="flex justify-end">
                @include('admin.user_dropdown')
            </div>
            <h1 class="text-xl font-bold mx-10">Clients</h1>
            <p class="my-3 mx-10">View your clients and add new clients</p>
            <a href="{{url('admin/clients/create')}}" class=" btn w-fit mx-10   ">Add New Client</a>
            <div class="mx-5 my-5">
                <table class="table bg-white">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                    <tr>
                        <td><a href="{{url('/admin/clients/'.$client->id)}}" class="text-blue-600 hover:underline ">{{ $client->id}}</a></td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>


@endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </section>
@endsection






