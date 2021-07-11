<div x-data="handleModal()">
    <template x-on:dispatchdeletemodal.window="initModal($event.detail.title, $event.detail.form_id);"></template>
    <div
        class="fixed z-10 inset-0 overflow-y-auto hidden"
        aria-labelledby="modal-title"
        role="dialog"
        aria-modal="true"
        x-show="showModal"
        x-ref="delete_modal"
    >
        <div
            class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
            @click.away="showModal = false"
            x-transition:enter="transition ease duration-100 transform"
            x-transition:enter-start="opacity-0 scale-90 translate-y-1"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            x-transition:leave="transition ease duration-100 transform"
            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
            x-transition:leave-end="opacity-0 scale-90 translate-y-1"
        >
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <i class="fas fa-exclamation-triangle text-red-500"></i>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Please confirm
                            </h3>
                            <div class="mt-2">
                                <p
                                    class="text-sm text-gray-500"
                                    x-text="text()"
                                ></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button
                        type="button"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm"
                        @click="submitDeleteForm()"
                        :disabled="!submitButton"
                    >
                        Delete
                    </button>
                    <button
                        type="button"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                        @click="showModal = !showModal"
                    >
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function handleModal() {
        return {
            showModal: false,
            title: '',
            formDeleteId: '',
            submitButton: false,
            initModal(title, form_id) {
                this.title = title;
                this.formDeleteId = form_id;
                this.submitButton = true;
                this.fnOpenModal();
            },
            text() {
                return `Are you sure you want to delete ${this.title} user?`;
            },
            fnOpenModal() {
                this.$refs.delete_modal.classList.remove('hidden');
                this.showModal = true;
            },
            submitDeleteForm() {
                this.submitButton = false;
                document.getElementById(this.formDeleteId).click();
            }
        }
    }
</script>
