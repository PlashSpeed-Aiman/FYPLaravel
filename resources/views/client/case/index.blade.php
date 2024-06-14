@extends('layout')
@section('content')
    <section class="flex bg-dashboard font-['Poppins']">
        @include('client.case.navbar',['id' => $id])
        <div class="w-full min-h-screen flex flex-col font-['Poppins']">
            <div class="flex justify-end">
                {{--    Profile Pic, might put dropdown for logout            --}}
                @include('client.user_dropdown')
            </div>
            <h1 class="text-xl font-bold mx-10">Cases</h1>
            <p class="text-lg my-3  mx-10">Case ID : {{ $case->id  }}</p>
            <p class="my-3 mx-10">View yours cases to see the progress, remarks, etc</p>
            <div class="mx-10">
                <table class="table bg-white">
                    <thead>
                    <tr>
                       <th>Documents Name</th>
                        <th>Uploaded Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><a class="text-blue-600 hover:underline " href="{{url('#')}}">Attachment 1</a></td>
                        <td>12/12/2021</td>
                        <td>
                            <div>
                                <button class="btn btn-ghost h-10  hover:bg-red-400">
                                    <svg class="h-5" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" fill="#c0bfbc"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#241f31" d="M160 256H96a32 32 0 0 1 0-64h256V95.936a32 32 0 0 1 32-32h256a32 32 0 0 1 32 32V192h256a32 32 0 1 1 0 64h-64v672a32 32 0 0 1-32 32H192a32 32 0 0 1-32-32V256zm448-64v-64H416v64h192zM224 896h576V256H224v640zm192-128a32 32 0 0 1-32-32V416a32 32 0 0 1 64 0v320a32 32 0 0 1-32 32zm192 0a32 32 0 0 1-32-32V416a32 32 0 0 1 64 0v320a32 32 0 0 1-32 32z"></path></g></svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    </tbody>
                </table>
                <h1 class="text-lg my-4">Remarks</h1>
                <div class="card shadow-sm bg-white p-5">
                    <h1>Case Ongoing</h1>
                </div>
            </div>
{{--    Add Documents        --}}
            <div class="mx-10" >
                <h1 class="my-5">Add Documents</h1>
                <form class='  flex flex-col items-center  card
                    border-[0.2rem] border-dashed
                    border-indigo-200
                    p-5
                    my-5
                    min-h-[10rem] text-center bg-indigo-50
                    cursor-pointer transition-colors duration-300 hover:bg-indigo-200'>
                    <div class=" ">
                        <input type="file" class=' hidden'>
                    </div>

                </form>
                <button class="btn bg-zinc-500 text-white w-fit">Upload</button>

            </div>
        </div>
    </section>

@endsection
