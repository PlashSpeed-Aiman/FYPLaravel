@extends('layout')
@section('content')
    <section x-data="proposalTab()" class="flex bg-dashboard font-['Poppins']">
        {{--        @include('client.case.navbar',['id' => $id])--}}
        <div class="w-full min-h-screen flex flex-col font-['Poppins']">
            <div class="flex justify-end">
                {{--    Profile Pic, might put dropdown for logout            --}}
                @include('lawyer.user_dropdown')
            </div>
            <h1 class="text-xl font-bold mx-10">Cases</h1>
            <p class="text-lg my-3  mx-10">Cases ID : {{ $case->id  }}</p>
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
                                    <svg class="h-5" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"
                                         fill="#c0bfbc">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                           stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill="#241f31"
                                                  d="M160 256H96a32 32 0 0 1 0-64h256V95.936a32 32 0 0 1 32-32h256a32 32 0 0 1 32 32V192h256a32 32 0 1 1 0 64h-64v672a32 32 0 0 1-32 32H192a32 32 0 0 1-32-32V256zm448-64v-64H416v64h192zM224 896h576V256H224v640zm192-128a32 32 0 0 1-32-32V416a32 32 0 0 1 64 0v320a32 32 0 0 1-32 32zm192 0a32 32 0 0 1-32-32V416a32 32 0 0 1 64 0v320a32 32 0 0 1-32 32z"></path>
                                        </g>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @foreach($documents as $document)
                        <tr>
                            <td><a class="text-blue-600 hover:underline " href="{{url('lawyer/documents/'.$document->id)}}">{{$document->document_name}}</a></td>
                            <td>{{$document->created_at}}</td>
                            <td>
                                <div>
                                    <button @click="deleteDocument({{$document->id}})" class="btn btn-ghost h-10  hover:bg-red-400">
                                        <svg class="h-5" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"
                                             fill="#c0bfbc">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                               stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path fill="#241f31"
                                                      d="M160 256H96a32 32 0 0 1 0-64h256V95.936a32 32 0 0 1 32-32h256a32 32 0 0 1 32 32V192h256a32 32 0 1 1 0 64h-64v672a32 32 0 0 1-32 32H192a32 32 0 0 1-32-32V256zm448-64v-64H416v64h192zM224 896h576V256H224v640zm192-128a32 32 0 0 1-32-32V416a32 32 0 0 1 64 0v320a32 32 0 0 1-32 32zm192 0a32 32 0 0 1-32-32V416a32 32 0 0 1 64 0v320a32 32 0 0 1-32 32z"></path>
                                            </g>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
                <h1 class="text-lg my-4">Remarks</h1>
                <div class="card shadow-sm bg-white p-5">
                    <h1>Case Ongoing</h1>
                </div>
            </div>
            {{--    Add Documents        --}}
            <section  class="flex flex-col items-center justify-center">
                <form
                    x-on:dragenter.prevent="handleDragEnter"
                    x-on:submit.prevent
                    x-on:drop.prevent="handleDrop"
                    x-on:dragleave.prevent="handleDragLeave"
                    x-on:dragover.prevent="handleDragOver"
                    x-on:click="openFileExplorer()"
                    class="flex flex-col items-center card border-[0.2rem] border-dashed border-indigo-200 p-5 mx-3 my-5 w-1/3 min-h-[10rem] text-center bg-indigo-50 cursor-pointer transition-colors duration-300 hover:bg-indigo-200"
                >
                    <input
                        type="file"
                        multiple
                        class="hidden"
                        x-ref="fileInput"
                        x-on:change="handleChange"
                        name="document"
                        accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf"
                    />
                </form>

                <div class="max-w-2xl flex flex-col items-center p-3 gap-2.5">
                    <template x-for="(file, index) in files" :key="index">
                        <div class="w-full justify-between bg-indigo-50 p-2 items-center rounded-md flex flex-row gap-5">
                            <div class="truncate">
                                <span x-text="file.name"></span>
                            </div>
                            <div>
                                <svg x-on:click="removeFile(index)" class="w-6 h-6 text-red-500 cursor-pointer">
                                    <!-- SVG for trash icon -->
                                    <use xlink:href="#icon-trash"></use>
                                </svg>
                            </div>
                        </div>
                    </template>
                </div>

                <button
                    type="button"
                    class="mx-auto btn w-auto"
                    x-on:click="handleSubmitFile"
                >
                    <span>Submit</span>
                </button>
            </section>
        </div>
    </section>
    <script defer>
        document.addEventListener('DOMContentLoaded',() =>{
            console.log('loaded');
            document.addEventListener('alpine:init', () => {
                Alpine.data('proposalTab', proposalTab);
            });
        })

        function proposalTab() {
            return {
                files: [],
                handleChange(event) {
                    if (event.target.files.length > 0) {
                        for (let i = 0; i < event.target.files.length; i++) {
                            this.files.push(event.target.files[i]);
                        }
                    }
                },
                handleDrop(event) {
                    if (event.dataTransfer.files.length > 0) {
                        for (let i = 0; i < event.dataTransfer.files.length; i++) {
                            this.files.push(event.dataTransfer.files[i]);
                        }
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
                deleteDocument(document_id) {
                    fetch("{{ url('api/v1/lawyers/documents') }}/" + document_id, {
                        method: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        },
                    })
                        //follow redirect
                        .then((response) => response.json())
                        .then((data) => {
                            alert("Document deleted successfully");
                            //refresh page
                            console.log(data);
                            location.reload();

                        })
                        .catch((error) => {
                            console.error("Error:", error);
                        });
                }


            };
        }

        function submitFiles(files) {
            const formData = new FormData();
            files.forEach((file) => {
                formData.append("files[]", file);
            });
            fetch("{{ url('api/v1/lawyers/documents?case_id='.$case->id) }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                body: formData,
            })
                .then((response) => response.json())
                .then((data) => {
                    alert("Document uploaded successfully");
                    console.log(data);
                    location.reload();
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        }
    </script>
@endsection

