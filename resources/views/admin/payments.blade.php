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
            {{-- PAGE CONTENT--}}
            <section>
                <h1 class="text-xl font-bold mx-10">Payment</h1>
                <p class="my-3 mx-10 ">View your invoices for rendered services</p>
                <div class="mx-5">
                    <table class="table bg-white">
                        <thead>
                        <tr>
                            <th>Invoice ID</th>
                            <th>Client Name</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Action</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoices as $invoice)
                            <tr>
                                <td>{{ $invoice->id }}</td>
                                <td>{{ $invoice->invoice_date }}</td>
                                <td>{{ $invoice->client->name }}</td>
                                <td>{{ $invoice->amount }}</td>
                                <td>
                                    {{--                                    <a href="{{ route('invoice.show', $invoice->id) }}" class="btn btn-primary">View</a>--}}
                                </td>
                                <td>
                                    @if($invoice->status == 'paid')
                                        <span class="text-green
                                        font-bold">{{ $invoice->status }}</span>
                                    @else
                                        <span class="text-red
                                        font-bold">{{ $invoice->status }}</span>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>


        </div>
    </section>
@endsection
