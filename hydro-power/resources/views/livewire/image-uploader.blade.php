<div>
    <div class="form-group mb-4 border-bottom pb-4">
        <label for="title">Images</label><br>
        <input type="file" wire:model="images" accept="image/*" multiple>

        <div id="imagesPreview" class="image-preview">
            @foreach($images as $index => $image)
                <div class="image-wrapper">
                    <img src="{{ $image->temporaryUrl() }}" alt="Image Preview" class="img-thumbnail">
                    <span class="remove-icon" wire:click="removeImage({{ $index }})">&#10060;</span>
                </div>
            @endforeach
        </div>
    </div>
</div>