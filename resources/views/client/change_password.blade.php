@extends('layout')
@section('content')
    <section class="bg-zinc-50 min-h-screen py-10">
        <div class="flex mx-10 mb-10 gap-5 items-center" >
            <a href="{{url('/client/settings')}}" class="btn rounded-full">
                <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M6 12H18M6 12L11 7M6 12L11 17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
            </a>
            <h1 class="underline text-2xl ">Change Password</h1>
        </div>

        <div class="flex  justify-between">
            <div id="profile" class="mx-10 flex ">
                <img class="h-24 w-24 rounded-full border-2 border-white shadow-md"
                     src="https://upload.wikimedia.org/wikipedia/en/3/3b/SpongeBob_SquarePants_character.svg"
                     id="profile-pic"/>
                <div class="mx-5 flex flex-col justify-center " id="profile-details">
                    <h1 class="font-bold text-xl">Spongebob SquarePants</h1>
                    <p class="text-gray-500">Cook at Krusty Krab</p>
                    <p class="text-gray-500">Bikini Bottom, Pacific Ocean</p>
                </div>
            </div>
        </div>
        <hr class="border m-10"/>
        <form id="name-form" class="">
            <div>
                <div class="flex justify-between">
                    <div class="flex flex-col w-full gap-2">
                        <label class="font-bold mx-11">New Password</label>
                        <input type="password" name="name" class="border border-zinc-200 input mx-10" placeholder="Name"/>
                        <label class="font-bold mx-11">Confirm New Password</label>
                        <input value="Confirm" type="password" name="name" class="border border-zinc-200 input mx-10" placeholder="Name"/>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-active ml-10 my-5" />
        </form>
    </section>
@endsection
