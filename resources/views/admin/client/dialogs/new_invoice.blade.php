<dialog id="my_modal_2" class="modal" >
    <div class="modal-box">
        <h3 class="font-bold text-lg">Add new invoice</h3>
        <p class="py-4">Press ESC key or click the button below to close</p>
        <div class="modal-action flex flex-col">
            <form>
                <div class="flex flex-col gap-2 ">
                    <label for="invoice_name" class="font-bold">Amount</label>
                    <input x-model="amount" type="number" name="amount" id="invoice_name" class="input border border-neutral-content" placeholder="Amount">

                </div>
                <h1 class="font-bold text-lg my-4">Upload Invoice</h1>
               <div
                    x-on:dragenter.prevent="handleDragEnter"
                    x-on:submit.prevent
                    x-on:drop.prevent="handleDrop"
                    x-on:dragleave.prevent="handleDragLeave"
                    x-on:dragover.prevent="handleDragOver"
                    x-on:click="openFileExplorer()"
                    class='  flex flex-col items-center  card
                    border-[0.2rem] border-dashed
                    border-indigo-200
                    p-5
                    my-5
                    min-h-[10rem] text-center bg-indigo-50
                    cursor-pointer transition-colors duration-300 hover:bg-indigo-200'>
                    <input
                        type="file"
                        class="hidden"
                        x-ref="fileInput"
                        x-on:change="handleChange"
                        name="document"
                        accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf"
                    />
                    @include('admin.client.dialogs.file_draw_svg')
                </div>
            </form>

            <div class="max-w-2xl mx-auto flex flex-col items-center p-3 gap-2.5">
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
                x-on:click="createNewInvoice"
                type="button"
                class="btn bg-zinc-500 w-fit">Upload</button>

        </div>
        </div>
</dialog>
