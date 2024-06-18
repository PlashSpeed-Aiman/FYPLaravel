@extends('layout')
@section('content')
    <section class="flex bg-dashboard font-['Poppins']">
        @include('client.navbar')
        <div class="w-full min-h-screen flex flex-col font-['Poppins']">
            <div class="flex justify-end">
                {{--    Profile Pic, might put dropdown for logout    --}}
                @include('client.user_dropdown')
            </div>
{{-- PAGE CONTENT--}}

            <section>
                <h1 class="text-xl font-bold mx-10">Payment</h1>
                <p class="my-3 mx-10 ">View your invoices for rendered services</p>
                <div class="flex  sm:md:lg:xl:flex-row my-5">

                <section class=" ">
                    <div class="mx-10 card md:lg:w-96 bg-white text-gray-600 border border-neutral-content">
                        <div class="card-body ">
                            <h2 class="card-title">Proceed to Payment</h2>
                            <p class="text-sm">Select Invoice Number</p>
                            <select class="select select-bordered w-full">
                                <option disabled="disabled" selected="selected">Select Invoice</option>
                                @foreach($invoices as $invoice)
                                    <option value="{{ $invoice->id }}">{{ $invoice->invoice_number }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-primary mt-3">Pay Now</button>
                        </div>
                    </div>
                </section>

                <div class="mx-9 flex-1">
                    <table class="table bg-white">
                        <thead>
                        <tr>
                            <th>Invoice ID</th>
                            <th>Invoice Number</th>
                            <th>Invoice Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoices as $invoice)
                            <tr>
                                <td>{{ $invoice->id }}</td>
                                <td>{{ $invoice->invoice_number }}</td>
                                <td>{{ $invoice->invoice_date }}</td>
                                <td>{{ $invoice->amount }}</td>

                                <td>
                                    @if($invoice->status == 'paid')
                                        <span class="text-green
                                        font-bold">{{ $invoice->status }}</span>
                                    @else
                                        <span class="text-red-500
                                        font-bold">{{ $invoice->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="text-blue-500 cursor-pointer hover:text-blue-900"
                                       >Download</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </section>


        </div>
    </section>
@endsection
