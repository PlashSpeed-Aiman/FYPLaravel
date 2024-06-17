@extends('layout')
@section('content')
    <section x-data="page()" class="flex bg-dashboard font-['Poppins']">
        @include('navbar')
        <div class="w-full min-h-screen flex flex-col font-['Poppins']">
            <div class="flex justify-end">
                @include('admin.user_dropdown')
            </div>
            <h1 class="text-xl font-bold mx-10">Client Details</h1>
            <p class="my-3 mx-10">View client details, assign cases, and add invoice + payments</p>
            <div class="mx-10 card w-96 bg-white text-gray-600 border border-neutral-content">
                <div class="card-body ">
                    <h2 class="card-title">{{$client->name}}</h2>
                    <p>{{$client->phone}}</p>
                    <p>{{$client->email}}</p>
                    <p>{{$client->address}}</p>

                </div>
            </div>
{{--            MODAL START--}}
            <dialog id="my_modal_1" class="modal">
                <div class="modal-box">
                    <h3 class="font-bold text-lg">Hello!</h3>
                    <p class="py-4">Press ESC key or click the button below to close</p>
                    <div class="modal-action">
                        <form method="dialog">
                            <label >
                                Case Name
                                <input x-model="case_name" class="input">
                            </label>
                            <button class="btn">Close</button>
                            <button @click="createNewCase()" class="btn bg-blue-900 text-white">Create</button>
                        </form>
                    </div>
                </div>
            </dialog>
{{--            MODAL END--}}
            <div class="mx-10 my-5 flex flex-col gap-2">
{{--                collapsing details--}}
                <div class="collapse bg-base-200">
                    <input type="radio" name="my-accordion-1" checked="checked" />
                    <div class="collapse-title text-xl font-medium">
                        Cases
                    </div>
                    <div class="collapse-content">
                        <button  onclick="my_modal_1.showModal()" class="btn w-fit mb-2 border border-neutral">Add New Case</button>
                        <table class="table bg-white">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Case Name</th>
                                <th>Case Number</th>
                                <th>Case Status</th>
                            </tr>
                            </thead>

                            <tbody>
                            @if($cases->isEmpty())
                                <tr>
                                    <td colspan="4">No cases found</td>
                                </tr>
                            @else
                            @foreach($cases as $case)
                                <tr>
                                    <td><a class="text-blue-600 hover:underline " href="{{url('lawyer/clients/'.$client->id.'/cases/'.$case->id)}}">{{ $case->id }}</a></td>
                                    <td>{{ $case->case_name }}</td>
                                    <td>{{ $case->case_number }}</td>
                                    <td>{{ $case->case_status }}</td>
                                </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="collapse bg-base-200">
                    <input type="radio" name="my-accordion-1" />
                    <div class="collapse-title text-xl font-medium">
                        Invoices
                    </div>
                    <div class="collapse-content">
                        <p>hello</p>
                    </div>
                </div>
                <div class="collapse bg-base-200">
                    <input type="radio" name="my-accordion-1" />
                    <div class="collapse-title text-xl font-medium">
                        Payments
                    </div>
                    <div class="collapse-content">
                        <p>hello</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <script defer>
        document.addEventListener('DOMContentLoaded',function(){
            //init alpine js
            document.addEventListener('alpine:init', () => {
                Alpine.data('page', page);
            });
        })

        function page(){
            return {
                case_name: '',
                createNewCase(){
                    fetch('{{url('/api/v1/admin/clients/'.$client->id.'/cases')}}',{
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        },
                        body: JSON.stringify({
                            case_name: this.case_name,
                        })

                        }
                    ).then(response => response.json())
                        .then(data => {
                            console.log(data)
                        }).catch(error => {
                            console.error('Error:', error);
                        });
                }

            }
        }
    </script>
@endsection






