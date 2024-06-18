@extends('layout')
@section('content')
    <section  class="flex bg-dashboard font-['Poppins']">
        @include('client.navbar')
        <div class="w-full min-h-screen flex flex-col font-['Poppins']">
            <div class="flex justify-end">
                {{--    Profile Pic, might put dropdown for logout    --}}
                @include('client.user_dropdown')
            </div>
{{-- PAGE CONTENT--}}
            @include('client.dialogs.payment_dialog')
            <section>
                <h1 class="text-xl font-bold mx-10">Payment</h1>
                <p class="my-3 mx-10 ">View your invoices for rendered services</p>
                <div class="flex  sm:md:lg:xl:flex-row my-5">

                <section x-data="paymentPage()" class=" ">
                    <div class="mx-10 card md:lg:w-96 bg-white text-gray-600 border border-neutral-content">
                        <div class="card-body ">
                            <h2 class="card-title">Proceed to Payment</h2>
                            <p class="text-sm">Select Invoice Number</p>
                            <h1 x-text="invoice"></h1>
                            <h1 x-text="amount"></h1>
                            <select  x-model="invoice" class="select select-bordered w-full">
                                <option hidden="" selected="selected">Select Invoice</option>
                                @foreach($invoices as $invoice)
                                    <option   value='{{ $invoice->id }}'>{{ $invoice->invoice_number }}</option>
                                @endforeach
                            </select>
                            <input x-model="amount" step="10.00" type="number"  class="input input-bordered mt-3" placeholder="Amount" >
                            <button @click="payNow" class="btn btn-primary mt-3">Pay Now</button>
                        </div>
                    </div>
                    <h1 x-text="selectedInvoice"></h1>
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
    <script defer>
        document.addEventListener('DOMContentLoaded', function () {
            document.addEventListener('alpine:init', () => {
                Alpine.data('paymentPage', paymentPage);
            });

        })

        function paymentPage() {
            return {
                invoice: null,
                amount: null,
                payNow() {
                    const element = document.getElementById('redirect_payment');
                    element.show();
                    fetch('{{url('/api/v1/clients/invoices/' )}}'+'/'+this.invoice+'/payments', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            invoice_id: this.invoice,
                            amount: this.amount
                        })
                    }).then(response => {
                        if (response.ok) {
                            return response.json();
                        }
                        throw new Error('Network response was not ok.');
                    }).then(data => {
                        console.log(data);
                        element.close();
                        location.replace(data.redirect_url);
                    }).catch(error => {
                        element.close();
                        console.error('There has been a problem with your fetch operation:', error);
                    });


                }
            }
        }

    </script>
@endsection
