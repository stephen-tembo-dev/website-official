<div>
    <div class="container">

        <h5 class="grey-text lighten-3 mt heading"><b>Update slider info</b></h5>

        <div class="row">
            <div class="col m8 s12 white">

                <form wire:submit.prevent="updateInfo">
                    <div class="custom-form z-depth-1">
                        <div>
                            <div class="row">
                                <div class="input-field col m12 s12">
                                    <input wire:model="sliderInfo.title" placeholder="Title" type="text"
                                        class="validate" maxlength="50">
                                    @error('sliderInfo.title') <span class="red-text">{{ $message }}</span> @enderror
                                </div>

                                <div class="input-field col m12 s12">
                                    <textarea wire:model="sliderInfo.text" placeholder="Message" maxlength="150"
                                        class="materialize-textarea"></textarea>
                                    @error('sliderInfo.text') <span class="red-text">{{ $message }}</span> @enderror
                                </div>

                                <div class="input-field col m12 s12">
                                    <input wire:model="sliderInfo.button_name" placeholder="Button name" type="text" maxlength="20"
                                        class="validate">
                                    @error('sliderInfo.text') <span class="red-text">{{ $message }}</span> @enderror
                                </div>

                                <div class="input-field col m12 s12">
                                    <input wire:model="sliderInfo.button_url" placeholder="Button url" type="text"
                                        class="validate">
                                    @error('sliderInfo.text') <span class="red-text">{{ $message }}</span> @enderror
                                </div>

                                <div class="file-field input-field col m12 s12">
                                    <div class="btn btn-small grey">
                                        <span>File</span>
                                        <input wire:model="sliderInfo.image_path" type="file">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                    @error('sliderInfo.image_path') <span class="red-text">{{ $message }}</span>
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
$wire.on('slider-info-updated', () => {
    M.toast({
        html: 'updated successfully'
    })
});

$wire.on('slider-info-update-failed', () => {
    M.toast({
        html: 'update unsuccessful'
    })
});
</script>
@endscript