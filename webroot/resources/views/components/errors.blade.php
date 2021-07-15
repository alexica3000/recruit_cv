@if ($errors->any())
    <div class="flex justify-center" x-data="handleErrorsData()" id="errors_notification">
        <div class="flex justify-between w-2/3 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

            <div>
                <button class="text-right" type="button" @click="hideModal">&times;</button>
            </div>
        </div>
</div>
@endif

<script>
    function handleErrorsData() {
        return {
            hideModal() {
                let modal = document.getElementById('errors_notification');
                modal.classList.add('hidden');
            }
        }
    }
</script>
