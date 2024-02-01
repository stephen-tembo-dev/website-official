<div>
    <div class="container">

        <h5 class="grey-text lighten-3 mt heading"><b>Update marketing info</b></h5>

        <div class="row">
            <div class="col m8 s12 white">

                <form wire:submit.prevent="updateInfo">
                    <div class="custom-form z-depth-1">
                        <div>
                            <div class="row">
                                <div class="input-field col m12 s12">
                                    <input placeholder="Title" wire:model="marketingInfo.title" id="title" type="text"
                                        class="validate" maxlength="50">
                                    @error('marketingInfo.title') <span class="red-text">{{ $message }}</span> @enderror
                                </div>

                                <div class="input-field col m12 s12">
                                    <textarea placeholder="Message" wire:model="marketingInfo.text" id="message" maxlength="1000"
                                        class="materialize-textarea"></textarea>
                                    @error('marketingInfo.text') <span class="red-text">{{ $message }}</span> @enderror
                                </div>

                                <div class="input-field col m12 s12">
                                    <textarea placeholder="Video URL" wire:model="marketingInfo.video_url" id="url"
                                        class="materialize-textarea"></textarea>
                                    @error('marketingInfo.video_url') <span class="red-text">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="file-field input-field col m12 s12">
                                <div class="btn btn-small grey">
                                    <span>File</span>
                                    <input wire:model="marketingInfo.image_path" type="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                                @error('marketingInfo.image_path') <span class="red-text">{{ $message }}</span>
                                @enderror
                            </div>

                            <button style="border-radius: 8px;" class="btn btn-small waves-effect waves-light black"
                                type="submit" name="action">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@script
<script>
$wire.on('marketing-info-updated', () => {
    M.toast({
        html: 'updated successfully'
    })
});

$wire.on('marketing-info-update-failed', () => {
    M.toast({
        html: 'update unsuccessful'
    })
});
</script>
@endscript