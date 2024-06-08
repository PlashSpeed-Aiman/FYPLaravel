@extends('layout')
@section('content')
    <section class="flex bg-dashboard font-['Poppins']">
        @include('navbar')
        <div class="w-full min-h-screen flex flex-col font-['Poppins']">
            <div class="flex justify-end">
                <img class="mx-10 my-5 h-14 w-14 rounded-full object-cover"
                     src="https://cdn.britannica.com/58/129958-050-C3FE2DD2/Adolf-Hitler-1933.jpg" alt="hero"
                     class="w-full h-96 object-cover"/>
            </div>
            <h1 class="text-xl font-bold mx-10">Appointment</h1>
            <p class="my-3 mx-10">View your appointments to see the progress, remarks, etc</p>
            <div class="mx-5 my-5">
                <table class="table bg-white">
                    <thead>
                    <tr>
                        <th>Appointment ID</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($appointments as $appointment)
                    <tr>
                        <td><a class="text-blue-600 hover:underline ">{{ $appointment->appointment_number}}</a></td>
                        <td>{{ $appointment->client->name }}</td>
                        <td>{{ $appointment->date }}</td>
                        <td>{{ $appointment->time }}</td>
                        <td>{{ $appointment->reason }}</td>
                        <td>{{ $appointment->appointment_status }}</td>
                        <td class="flex">
                            <a href="{{url('admin/appointments/1/approve')}}" class="border mx-0.5 rounded transition-colors hover:bg-green-400" ><svg class="h-12 w-12" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-labelledby="calendarAddIconTitle" stroke="#000000" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title id="calendarAddIconTitle">Approve</title> <path d="M3 5H21V21H3V5Z"></path> <path d="M21 9H3"></path> <path d="M7 5V3"></path> <path d="M17 5V3"></path> <path d="M15 15H9"></path> <path d="M12 12V18"></path> </g></svg></a>
                            <a href="{{url('admin/appointments/1/decline')}}" class="border mx-0.5 rounded transition-colors hover:bg-red-400"><svg class="h-12 w-12" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-labelledby="calendarDeclineIconTitle" stroke="#000000" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title id="calendarDeclineIconTitle">Decline</title> <path d="M3 5H21V21H3V5Z"></path> <path d="M21 9H3"></path> <path d="M7 5V3"></path> <path d="M17 5V3"></path> <path d="M15 18L8.99999 12"></path> <path d="M15 12L9 18"></path> </g></svg></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </section>
@endsection






