<div class="dropdown dropdown-end ">

    <img tabindex="0" role="button" class="rounded-full mx-10 mt-5 h-14 w-14  object-cover"
         src="{{asset('/assets/profile-picture.svg')}}" alt="hero"
    />
    <ul tabindex="0" class="mx-10 mt-2 dropdown-content z-[1] menu  shadow bg-base-100 rounded-box w-48">
        <li><a href="{{ url('client/settings') }}">Settings</a></li>
        <li><a href="{{ url('logout') }}">Logout</a></li>
    </ul>
</div>
