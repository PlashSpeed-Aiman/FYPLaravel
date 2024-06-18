<dialog id="my_modal_1" class="modal">
    <div class="modal-box">
        <h3 class="font-bold text-lg">Add new case</h3>
        <p class="py-4">Press ESC key or click the button below to close</p>
        <div class="modal-action">
            <form method="dialog" class="w-full flex flex-col gap-3">

                <label for="case_name" class="text-sm ">
                    Case Name
                </label>
                <input  x-model="case_name" class="input border border-neutral">
                <div>
                    <button class="btn">Close</button>
                    <button @click="createNewCase" class="btn bg-blue-900 text-white">Create</button>

                </div>


            </form>
        </div>
    </div>
</dialog>
