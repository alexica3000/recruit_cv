@if (session('status'))
    <div class="flex justify-center" x-data="handleMessageData()" id="message_notification">
        <div class="flex justify-between w-2/3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <div>
                {{ session('status') }}
            </div>

            <div>
                <button class="text-right" type="button" @click="hideModal">&times;</button>
            </div>
        </div>
    </div>
@endif

<script>
    function handleMessageData() {
        return {
            hideModal() {
                let modal = document.getElementById('message_notification');
                modal.classList.add('hidden');
            }
        }
    }
</script>
