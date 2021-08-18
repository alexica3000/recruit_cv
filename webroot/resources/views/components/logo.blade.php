<div>
    <label class="px-4 py-2 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue-600 hover:text-white">
        <i class="fas fa-cloud-upload-alt"></i>
        <span class="mt-2 text-base leading-normal">Select a file</span>
        <input type='file' class="hidden" name="image" />
    </label>
    @if($model->logo)
        <div class="w-1/4">
            <img src="{{ $model->logoUrl }}" alt="">
        </div>
    @endif
</div>
