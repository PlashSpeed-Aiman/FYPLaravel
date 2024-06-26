<nav class="p-5 w-48 bg-white   min-h-screen">
    <img
        src='{{asset('/assets/icon.svg')}}'
        class="object-cover my-4 h-48 " id="profile-pic"/>
    <ul class="flex flex-col gap-3 font-['Poppins']">
        <li><a class=" w-full flex gap-2 hover:text-blue-600 f  " href="{{ route('admin.dashboard') }}">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M12 12C12 11.4477 12.4477 11 13 11H19C19.5523 11 20 11.4477 20 12V19C20 19.5523 19.5523 20 19 20H13C12.4477 20 12 19.5523 12 19V12Z"
                            stroke="#000000" stroke-width="2" stroke-linecap="round"></path>
                        <path
                            d="M4 5C4 4.44772 4.44772 4 5 4H8C8.55228 4 9 4.44772 9 5V19C9 19.5523 8.55228 20 8 20H5C4.44772 20 4 19.5523 4 19V5Z"
                            stroke="#000000" stroke-width="2" stroke-linecap="round"></path>
                        <path
                            d="M12 5C12 4.44772 12.4477 4 13 4H19C19.5523 4 20 4.44772 20 5V7C20 7.55228 19.5523 8 19 8H13C12.4477 8 12 7.55228 12 7V5Z"
                            stroke="#000000" stroke-width="2" stroke-linecap="round"></path>
                    </g>
                </svg>
                Dashboard
            </a></li>
        <li><a class=" w-full flex gap-2 hover:text-blue-600  " href="">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <circle cx="12" cy="13" r="8" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></circle>
                        <path d="M12 9V13L15 15" stroke="#000000" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                        <path d="M18 3L21 6" stroke="#000000" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                        <path d="M6 3L3 6" stroke="#000000" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                    </g>
                </svg>
                Case Status</a></li>
        <li><a class=" w-full flex gap-2 hover:text-blue-600   " href="{{route('admin.appointments')}}">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#000000"
                              stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M9 5H7C5.89543 5 5 5.89543 5 7V19C5 20.1046 5.89543 21 7 21H10M15 5H17C18.1046 5 19 5.89543 19 7V12"
                            stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M13 19L15 21L20 16" stroke="#000000" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                    </g>
                </svg>
                Appointments
            </a></li>
        <li><a class=" w-full flex gap-2 hover:text-blue-600   " href="{{route('admin.payments')}}">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <rect x="3" y="6" width="18" height="13" rx="2" stroke="#000000" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round"></rect>
                        <path d="M3 10H20.5" stroke="#000000" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                        <path d="M7 15H9" stroke="#000000" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                    </g>
                </svg>
                Payment</a></li>
        <li>
            <a class=" w-full flex gap-2 hover:text-blue-600   " href="{{route('admin.clients')}}">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z"
                            stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M12 14C9.33333 15.3333 5.33333 16.6667 4 18V20H20V18C18.6667 16.6667 14.6667 15.3333 12 14Z"
                            stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                </svg>
                Clients</a>
        </li>
        <li><a class=" w-full flex gap-2 hover:text-blue-600   " href="">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M14 5.28988H13C13 5.7323 13.2907 6.12213 13.7148 6.24833L14 5.28988ZM15.3302 5.84137L14.8538 6.72058C15.2429 6.93144 15.7243 6.86143 16.0373 6.54847L15.3302 5.84137ZM16.2426 4.92891L15.5355 4.2218V4.2218L16.2426 4.92891ZM17.6569 4.92891L16.9498 5.63601L16.9498 5.63602L17.6569 4.92891ZM19.0711 6.34312L19.7782 5.63602V5.63602L19.0711 6.34312ZM19.0711 7.75734L18.364 7.05023L19.0711 7.75734ZM18.1586 8.66978L17.4515 7.96268C17.1386 8.27563 17.0686 8.75709 17.2794 9.14621L18.1586 8.66978ZM18.7101 10L17.7517 10.2853C17.8779 10.7093 18.2677 11 18.7101 11V10ZM18.7101 14V13C18.2677 13 17.8779 13.2907 17.7517 13.7148L18.7101 14ZM18.1586 15.3302L17.2794 14.8538C17.0686 15.2429 17.1386 15.7244 17.4515 16.0373L18.1586 15.3302ZM19.0711 16.2427L19.7782 15.5356V15.5356L19.0711 16.2427ZM19.0711 17.6569L18.364 16.9498L18.364 16.9498L19.0711 17.6569ZM17.6569 19.0711L18.364 19.7782V19.7782L17.6569 19.0711ZM15.3302 18.1586L16.0373 17.4515C15.7243 17.1386 15.2429 17.0686 14.8538 17.2794L15.3302 18.1586ZM14 18.7101L13.7148 17.7517C13.2907 17.8779 13 18.2677 13 18.7101H14ZM10 18.7101H11C11 18.2677 10.7093 17.8779 10.2853 17.7517L10 18.7101ZM8.6698 18.1586L9.14623 17.2794C8.7571 17.0685 8.27565 17.1385 7.96269 17.4515L8.6698 18.1586ZM7.75736 19.071L7.05026 18.3639L7.05026 18.3639L7.75736 19.071ZM6.34315 19.071L5.63604 19.7782H5.63604L6.34315 19.071ZM4.92894 17.6568L4.22183 18.3639H4.22183L4.92894 17.6568ZM4.92894 16.2426L4.22183 15.5355H4.22183L4.92894 16.2426ZM5.84138 15.3302L6.54849 16.0373C6.86144 15.7243 6.93146 15.2429 6.7206 14.8537L5.84138 15.3302ZM5.28989 14L6.24835 13.7147C6.12215 13.2907 5.73231 13 5.28989 13V14ZM5.28989 10V11C5.73231 11 6.12215 10.7093 6.24835 10.2852L5.28989 10ZM5.84138 8.66982L6.7206 9.14625C6.93146 8.75712 6.86145 8.27567 6.54849 7.96272L5.84138 8.66982ZM4.92894 7.75738L4.22183 8.46449H4.22183L4.92894 7.75738ZM4.92894 6.34317L5.63605 7.05027H5.63605L4.92894 6.34317ZM6.34315 4.92895L7.05026 5.63606L7.05026 5.63606L6.34315 4.92895ZM7.75737 4.92895L8.46447 4.22185V4.22185L7.75737 4.92895ZM8.6698 5.84139L7.9627 6.54849C8.27565 6.86145 8.7571 6.93146 9.14623 6.7206L8.6698 5.84139ZM10 5.28988L10.2853 6.24833C10.7093 6.12213 11 5.7323 11 5.28988H10ZM11 2C9.89545 2 9.00002 2.89543 9.00002 4H11V4V2ZM13 2H11V4H13V2ZM15 4C15 2.89543 14.1046 2 13 2V4H15ZM15 5.28988V4H13V5.28988H15ZM15.8066 4.96215C15.3271 4.70233 14.8179 4.48994 14.2853 4.33143L13.7148 6.24833C14.1132 6.36691 14.4944 6.52587 14.8538 6.72058L15.8066 4.96215ZM15.5355 4.2218L14.6231 5.13426L16.0373 6.54847L16.9498 5.63602L15.5355 4.2218ZM18.364 4.2218C17.5829 3.44075 16.3166 3.44075 15.5355 4.2218L16.9498 5.63602V5.63601L18.364 4.2218ZM19.7782 5.63602L18.364 4.2218L16.9498 5.63602L18.364 7.05023L19.7782 5.63602ZM19.7782 8.46444C20.5592 7.68339 20.5592 6.41706 19.7782 5.63602L18.364 7.05023L18.364 7.05023L19.7782 8.46444ZM18.8657 9.37689L19.7782 8.46444L18.364 7.05023L17.4515 7.96268L18.8657 9.37689ZM19.6686 9.71475C19.5101 9.18211 19.2977 8.67285 19.0378 8.19335L17.2794 9.14621C17.4741 9.50555 17.6331 9.8868 17.7517 10.2853L19.6686 9.71475ZM18.7101 11H20V9H18.7101V11ZM20 11H22C22 9.89543 21.1046 9 20 9V11ZM20 11V13H22V11H20ZM20 13V15C21.1046 15 22 14.1046 22 13H20ZM20 13H18.7101V15H20V13ZM19.0378 15.8066C19.2977 15.3271 19.5101 14.8179 19.6686 14.2852L17.7517 13.7148C17.6331 14.1132 17.4741 14.4944 17.2794 14.8538L19.0378 15.8066ZM19.7782 15.5356L18.8657 14.6231L17.4515 16.0373L18.364 16.9498L19.7782 15.5356ZM19.7782 18.364C20.5592 17.5829 20.5592 16.3166 19.7782 15.5356L18.364 16.9498H18.364L19.7782 18.364ZM18.364 19.7782L19.7782 18.364L18.364 16.9498L16.9498 18.364L18.364 19.7782ZM15.5355 19.7782C16.3166 20.5592 17.5829 20.5592 18.364 19.7782L16.9498 18.364L15.5355 19.7782ZM14.6231 18.8657L15.5355 19.7782L16.9498 18.364L16.0373 17.4515L14.6231 18.8657ZM14.2853 19.6686C14.8179 19.5101 15.3271 19.2977 15.8066 19.0378L14.8538 17.2794C14.4944 17.4741 14.1132 17.6331 13.7148 17.7517L14.2853 19.6686ZM15 20V18.7101H13V20H15ZM13 22C14.1046 22 15 21.1046 15 20H13V22ZM11 22H13V20H11V22ZM9.00002 20C9.00002 21.1046 9.89545 22 11 22V20H9.00002ZM9.00002 18.7101V20H11V18.7101H9.00002ZM8.19337 19.0378C8.67287 19.2977 9.18213 19.5101 9.71477 19.6686L10.2853 17.7517C9.88681 17.6331 9.50557 17.4741 9.14623 17.2794L8.19337 19.0378ZM8.46447 19.7782L9.3769 18.8657L7.96269 17.4515L7.05026 18.3639L8.46447 19.7782ZM5.63604 19.7782C6.41709 20.5592 7.68342 20.5592 8.46447 19.7781L7.05026 18.3639L5.63604 19.7782ZM4.22183 18.3639L5.63604 19.7782L7.05026 18.3639L5.63604 16.9497L4.22183 18.3639ZM4.22183 15.5355C3.44078 16.3166 3.44078 17.5829 4.22183 18.3639L5.63604 16.9497V16.9497L4.22183 15.5355ZM5.13427 14.6231L4.22183 15.5355L5.63604 16.9497L6.54849 16.0373L5.13427 14.6231ZM4.33144 14.2852C4.48996 14.8179 4.70234 15.3271 4.96217 15.8066L6.7206 14.8537C6.52589 14.4944 6.36693 14.1132 6.24835 13.7147L4.33144 14.2852ZM5.28989 13H4V15H5.28989V13ZM4 13H4H2C2 14.1046 2.89543 15 4 15V13ZM4 13V11H2V13H4ZM4 11V9C2.89543 9 2 9.89543 2 11H4ZM4 11H5.28989V9H4V11ZM4.96217 8.1934C4.70235 8.67288 4.48996 9.18213 4.33144 9.71475L6.24835 10.2852C6.36693 9.88681 6.52589 9.50558 6.7206 9.14625L4.96217 8.1934ZM4.22183 8.46449L5.13428 9.37693L6.54849 7.96272L5.63605 7.05027L4.22183 8.46449ZM4.22183 5.63606C3.44078 6.41711 3.44079 7.68344 4.22183 8.46449L5.63605 7.05027L5.63605 7.05027L4.22183 5.63606ZM5.63605 4.22185L4.22183 5.63606L5.63605 7.05027L7.05026 5.63606L5.63605 4.22185ZM8.46447 4.22185C7.68343 3.4408 6.4171 3.4408 5.63605 4.22185L7.05026 5.63606V5.63606L8.46447 4.22185ZM9.37691 5.13428L8.46447 4.22185L7.05026 5.63606L7.9627 6.54849L9.37691 5.13428ZM9.71477 4.33143C9.18213 4.48995 8.67287 4.70234 8.19337 4.96218L9.14623 6.7206C9.50557 6.52588 9.88681 6.36692 10.2853 6.24833L9.71477 4.33143ZM9.00002 4V5.28988H11V4H9.00002Z"
                            fill="#000000"></path>
                        <circle cx="12" cy="12" r="3" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></circle>
                    </g>
                </svg>
                Settings</a></li>
    </ul>
</nav>
