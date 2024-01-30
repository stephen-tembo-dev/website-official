<div>
    <div class="container">

        <h5 class="grey-text lighten-3 mt heading"><b>Update news info</b></h5>

        <div class="row">

            <div class="col m8 s12 white">
                <div class="custom-form z-depth-1">
                    <form wire:submit.prevent="updateInfo">
                        <div>
                            <div class="row">
                                <div class="input-field col m12 s12">
                                    <input wire:model="newsInfo.title" placeholder="Title" id="title" type="text" class="validate"
                                        maxlength="70">
                                    @error('newsInfo.title') <span class="red-text">{{ $message }}</span> @enderror
                                </div>

                                <div class="input-field col m12 s12">
                                    <textarea wire:model="newsInfo.text" placeholder="Message" id="message"
                                        class="materialize-textarea"></textarea>
                                    @error('newsInfo.text') <span class="red-text">{{ $message }}</span> @enderror
                                </div>

                                <div class="input-field col m12 s12">
                                    <textarea wire:model="newsInfo.video_url" placeholder="Video url" id="url" 
                                        class="materialize-textarea"></textarea>
                                    <label class="active" for="url">Video URL</label>
                                    @error('newsInfo.video_url') <span class="red-text">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="file-field input-field col m12 s12">
                                <div class="btn btn-small grey">
                                    <span>Photo</span>
                                    <input wire:model="newsInfo.image_path" type="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                                @error('newsInfo.image_path') <span class="red-text">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="file-field input-field col m12 s12">
                                <div class="btn btn-small grey">
                                    <span>Attachment</span>
                                    <input wire:model="newsInfo.attachment_path" type="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                                @error('newsInfo.attachment_path') <span class="red-text">{{ $message }}</span>
                                @enderror
                            </div>

                            <button style="border-radius: 8px;" class="btn btn-small waves-effect waves-light black"
                                type="submit" name="action">
                                Save
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
$wire.on('news-story-updated', () => {
    M.toast({
        html: 'updated successfully'
    })
});

$wire.on('news-story-update-failed', () => {
    M.toast({
        html: 'update unsuccessful'
    })
});
</script>
@endscript