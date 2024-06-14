@extends('layout')
@section('content')
    <section class="flex bg-dashboard font-['Poppins']">
{{--        @include('client.case.navbar',['id' => $id])--}}
        <div class="w-full min-h-screen flex flex-col font-['Poppins']">
            <div class="flex justify-end">
                {{--    Profile Pic, might put dropdown for logout            --}}
                @include('lawyer.user_dropdown')
            </div>
            <section>
                <h1 class="text-xl font-bold mx-10">Client</h1>
{{--            two tabs, cases, and invoice using hypermedia   --}}
                <section class="mx-5 ">
                    <div class="collapse bg-base-200 my-2">
                        <input type="radio" name="my-accordion-1" checked="checked" />
                        <div class="collapse-title text-xl font-medium">
                            Cases
                        </div>
                        <div class="collapse-content">
                            <table class="table bg-white">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Case Name</th>
                                    <th>Case Type</th>
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
                                        <td><a class="text-blue-600 hover:underline " href="{{url('lawyer/clients/'.$id.'/cases/'.$case->id)}}">{{ $case->id }}</a></td>
                                        <td>{{ $case->case_number }}</td>
                                        <td>{{ $case->type }}</td>
                                        <td>{{ $case->status }}</td>
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
                            <table class="table bg-white">
<thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Invoice Name</th>
                                    <th>Amount</th>
                                    <th>Due Date</th>
                                </tr>
                                </thead>

                                <tbody>
{{--                                @if($invoices->isEmpty())--}}
{{--                                    <tr>--}}
{{--                                        <td colspan="4">No invoices found</td>--}}
{{--                                    </tr>--}}
{{--                                @else--}}
{{--                                @foreach($invoices as $invoice)--}}
{{--                                    <tr>--}}
{{--                                        <td><a class="text-blue-600 hover:underline " href="{{url('lawyer/invoices/'.$invoice->id)}}">{{ $invoice->id }}</a></td>--}}
{{--                                        <td>{{ $invoice->name }}</td>--}}
{{--                                        <td>{{ $invoice->amount }}</td>--}}
{{--                                        <td>{{ $invoice->due_date }}</td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                @endif--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>


            </section>

        </div>
    </section>

@endsection
