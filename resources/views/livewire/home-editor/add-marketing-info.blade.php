<div>
    <div class="container">

        <h5 class="grey-text lighten-3 mt heading"><b>Add marketing info</b></h5>

        <div class="row">

            <div class="col m8 s12 white">
                <div class="custom-form z-depth-1">
                    <form wire:submit.prevent="processInfo">
                        <div>
                            <div class="row">
                                <div class="input-field col m12 s12">
                                    <input wire:model="marketingInfo.title" id="title" type="text" class="validate" required
                                        maxlength="50">
                                    <label class="active" for="title">Title</label>
                                    @error('marketingInfo.title') <span class="red-text">{{ $message }}</span> @enderror
                                </div>

                                <div class="input-field col m12 s12">
                                    <textarea wire:model="marketingInfo.text" id="message" maxlength="1000" required
                                        class="materialize-textarea"></textarea>
                                    <label class="active" for="message">Message</label>
                                    @error('marketingInfo.text') <span class="red-text">{{ $message }}</span> @enderror
                                </div>

                                <div class="input-field col m12 s12">
                                    <textarea wire:model="marketingInfo.video_url" id="url" required
                                        class="materialize-textarea"></textarea>
                                    <label class="active" for="url">Video URL</label>
                                    @error('marketingInfo.video_url') <span class="red-text">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="file-field input-field col m12 s12">
                                <div class="btn btn-small grey">
                                    <span>Photo - 2000 w x 1000 h</span>
                                    <input wire:model="marketingInfo.image_path" type="file" required>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                                @error('marketingInfo.image_path') <span class="red-text">{{ $message }}</span>
                                @enderror
                            </div>

                            <button style="border-radius: 8px;" class="btn btn-small waves-effect waves-light black"
                                type="submit" name="action">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@script
<script>
$wire.on('marketing-info-created', () => {
    M.toast({
        html: 'created successfully'
    })
});

$wire.on('marketing-info-creation-failed', () => {
    M.toast({
        html: 'creation unsuccessful'
    })
});
</script>
@endscript