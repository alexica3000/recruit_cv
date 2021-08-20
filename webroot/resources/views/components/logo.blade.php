<div x-data="handlerImage">

        <div class="mt-5 pt-1 w-full">
            <div class="pt-2 {{ $model->logo ? 'hidden' : '' }}" id="input_block">
                <label class="px-4 py-2 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue-600 hover:text-white">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <span class="mt-2 text-base leading-normal">Select a file</span>
                    <input type='file' class="hidden" name="image" accept="image/*" @change="previewImage" />
                </label>
            </div>

            <div class="relative {{ $model->logo ? '' : 'hidden' }}" id="output_block">
                <img
                    src="{{ $model->logo ? $model->logoUrl : '' }}"
                    alt="text"
                    id="image_file"
                >
                <span
                    class="absolute"
                    style="right: -20px; bottom: 0; cursor: pointer"
                    @click="deleteImage"
                >
                    <i class="fas fa-trash-alt"></i>
                </span>
            </div>
        </div>
</div>

<script>
    function handlerImage() {
        return {
            image: document.getElementById('image_file'),
            input: document.getElementById('input_block'),
            output: document.getElementById('output_block'),
            previewImage: function (e) {
                if (e.target.files.length === 0) {
                    return;
                }
                this.image.src = URL.createObjectURL(e.target.files[0]);
                this.image.onload = () => URL ? URL.revokeObjectURL(this.image.src) : null;
                this.output.classList.remove('hidden');
                this.input.classList.add('hidden');
            },
            deleteImage() {
                if(confirm('Are you sure?')) {
                    this.output.classList.add('hidden');
                    this.input.classList.remove('hidden');
                }
            }
        }
    }
</script>
