<nav class="p-5 w-48 bg-white min-h-screen">
    <img                      src="{{asset('assets/icon.svg')}}"

                              class="h-64 w-64 object-cover   " id="profile-pic"/>
    <ul class="flex flex-col gap-3 font-['Poppins']">

        <li><a class=" w-full flex gap-2 hover:text-blue-600  " href="{{route('client.cases')}}">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="12" cy="13" r="8" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></circle> <path d="M12 9V13L15 15" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M18 3L21 6" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 3L3 6" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                Case Status</a></li>
        <li><a class=" w-full flex gap-2 hover:text-blue-600   " href="{{route('client.appointments')}}">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M9 5H7C5.89543 5 5 5.89543 5 7V19C5 20.1046 5.89543 21 7 21H10M15 5H17C18.1046 5 19 5.89543 19 7V12" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M13 19L15 21L20 16" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                Appointments</a></li>
        <li><a class=" w-full flex gap-2 hover:text-blue-600   " href="{{route('client.payments')}}">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect x="3" y="6" width="18" height="13" rx="2" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></rect> <path d="M3 10H20.5" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M7 15H9" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                Payment</a></li>

    </ul>
</nav>
