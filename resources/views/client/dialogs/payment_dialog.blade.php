<dialog id="redirect_payment" class="modal">
    <div class="modal-box">
        <h3 class="font-bold text-lg">Redirect to Payment Gateway</h3>
        <p class="py-4">You will be promptly redirected to the payment gateway to complete the payment.</p>
{{--        animation--}}
        <div class="flex justify-center">
            <div class="loader ease-linear rounded-full border-8 border-t-8 border-gray-200 h-32 w-32"></div>
{{--       rot --}}
        </div>

    </div>
    <style>
        .loader {
            border-top-color: #3498db;
            border-left-color: #3498db;
            border-bottom-color: #3498db;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
        </style>


</dialog>
