<button id="deleteEventBtn" class=" hidden bg-rose-500 text-white rounded-md px-4 py-2 hover:bg-rose-700 transition"
    onclick="openModal('deleteEvent')">
    Click to Open modal
</button>

<div id="deleteEvent" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 ">
    <div class="relative top-40 mx-auto shadow-xl rounded-md bg-[#1f1f1f] max-w-md">

        <div class="flex justify-end p-2">
            <button onclick="closeModal('deleteEvent')" type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <div class="p-6 pt-0 text-center ">
            <h3 class="text-xl font-normal text-white mt-5 mb-6">Are you sure you want to delete this user?</h3>
            <div class="flex items-center gap-x-5 justify-center w-full">
                <form method="post" id="deleteEventForm" action="">
                    @csrf @method("DELETE")
                    <button class="bg-[#ff6d2f] px-5 py-2 text-white rounded-lg">Delete</button>
                </form>

                <a href="#" onclick="closeModal('deleteEvent')"
                    class="text-gray-900 bg-white hover:bg-gray-100  focus:ring-0 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center"
                    data-modal-toggle="delete-user-modal">
                    No, cancel
                </a>

            </div>

        </div>

    </div>
</div>

<script type="text/javascript">
    window.openModal = function(modalId) {
        document.getElementById(modalId).style.display = 'block'
        document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden')
    }

    window.closeModal = function(modalId) {
        document.getElementById(modalId).style.display = 'none'
        document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
    }

    // Close all modals when press ESC
    document.onkeydown = function(event) {
        event = event || window.event;
        if (event.keyCode === 27) {
            document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
            let modals = document.getElementsByClassName('modal');
            Array.prototype.slice.call(modals).forEach(i => {
                i.style.display = 'none'
            })
        }
    };
</script>
