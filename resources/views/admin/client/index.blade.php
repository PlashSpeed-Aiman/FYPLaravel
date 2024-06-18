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
          @include('admin.client.dialogs.new_case')
          @include('admin.client.dialogs.new_invoice')
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
                                    <td><a class="text-blue-600 hover:underline " href="{{url('admin/clients/'.$client->id.'/cases/'.$case->id)}}">{{ $case->id }}</a></td>
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
                        <button onclick="my_modal_2.showModal()" class="btn w-fit mb-2 border border-neutral">Add New Invoice</button>
                       <table class="table bg-white">
                           <thead>
                            <tr>
                                 <th>No.</th>
                                 <th>Invoice Number</th>
                                 <th>Amount</th>
                                 <th>Due Date</th>
                                 <th>Status</th>
                                    <th>Actions</th>
                            </tr>

                           </thead>
                            <tbody>
                            @if($invoices->isEmpty())
                                <tr>
                                    <td colspan="5">No invoices found</td>
                                </tr>
                            @else
                            @foreach($invoices as $invoice)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $invoice->invoice_number }}</td>
                                    <td>{{ $invoice->amount }}</td>
                                    <td>{{ $invoice->document_name }}</td>
                                    <td>{{ $invoice->status }}</td>
                                    <td><a class="text-blue-600 hover:underline " href="{{url('admin/clients/'.$client->id.'/invoices/'.$invoice->id)}}">Download</a></td>
                                </tr>
                            @endforeach
    @endif
                       </table>
                    </div>
                </div>
                <div class="collapse bg-base-200">
                    <input type="radio" name="my-accordion-1" />
                    <div class="collapse-title text-xl font-medium">
                        Payments
                    </div>
                    <div class="collapse-content">
                        <table class="table bg-white">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Payment Number</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
{{--                            @if($payments->isEmpty())--}}
{{--                                <tr>--}}
{{--                                    <td colspan="5">No payments found</td>--}}
{{--                                </tr>--}}
{{--                            @else--}}
{{--                            @foreach($payments as $payment)--}}
{{--                                <tr>--}}
{{--                                    <td><a class="text-blue-600 hover:underline " href="{{url('lawyer/clients/'.$client->id.'/payments/'.$payment->id)}}">{{ $payment->id }}</a></td>--}}
{{--                                    <td>{{ $payment->payment_number }}</td>--}}
{{--                                    <td>{{ $payment->amount }}</td>--}}
{{--                                    <td>{{ $payment->date }}</td>--}}
{{--                                    <td>{{ $payment->status }}</td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            @endif--}}
                            </tbody>
                        </table>
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
                amount:'',
                due_date:'',
                files: [],
                createNewInvoice(e){
                    const formData = new FormData();
                    this.files.forEach((file) => {
                        formData.append("files[]", file);
                    });
                    console.log(this.amount)
                    formData.append("amount", this.amount);
                    if(this.amount === ''){
                        e.preventDefault()
                        return
                    }
                    fetch('{{url('/api/v1/admin/clients/'.$client->id.'/invoices')}}',{
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        },
                        body: formData
                    })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data)
                            location.reload()
                        }).catch(error => {
                        console.error('Error:', error);
                    });
                },
                createNewCase(e){
                    if(this.case_name === ''){
                        e.preventDefault()
                        return
                    }
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
                    ).then(response => response)
                        .then(data => {
                            console.log(data)
                            location.reload()
                        }).catch(error => {
                            console.error('Error:', error);
                        });
                },
                handleChange(event) {
                    if (event.target.files.length > 0) {
                        // for (let i = 0; i < event.target.files.length; i++) {
                            this.files[0] = event.target.files[0]
                        // }
                    }
                },
                handleDrop(event) {
                    if (event.dataTransfer.files.length > 0) {
                            this.files[0] = event.dataTransfer.files[0];
                    }
                    this.dragActive = false;
                },
                handleDragLeave() {
                    this.dragActive = false;
                },
                handleDragOver() {
                    this.dragActive = true;
                },
                handleDragEnter() {
                    this.dragActive = true;
                },
                removeFile(index) {
                    this.files.splice(index, 1);
                },
                openFileExplorer() {
                    this.$refs.fileInput.value = "";
                    this.$refs.fileInput.click();
                },
                handleSubmitFile() {
                    if (this.files.length === 0) {
                        alert("No file has been submitted");
                    } else {
                        submitFiles(this.files);
                        this.files = [];
                    }
                },

            }
        }
        function submitFiles(files) {
            const formData = new FormData();
            files.forEach((file) => {
                formData.append("files[]", file);
            });
            fetch("{{ url('api/v1/clients/documents?case_id='.$case->id) }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                body: formData,
            })
                .then((response) => response.json())
                .then((data) => {
                    alert("Files uploaded successfully");
                    //refresh page
                    console.log(data);
                    location.reload();

                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        }
    </script>
@endsection






