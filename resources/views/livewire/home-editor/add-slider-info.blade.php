<div>
    <div class="container">

        <h5 class="grey-text lighten-3 mt heading"><b>Add slider info</b></h5>

        <div class="row">
            <div class="col m8 s12 white">

                <form wire:submit.prevent="processInfo">
                    <div class="custom-form z-depth-1">
                        <div>
                            <div class="row">
                                <div class="input-field col m12 s12">
                                    <input wire:model="sliderInfo.title" id="title" type="text" class="validate"
                                        maxlength="70">
                                    <label class="active" for="title">Title</label>
                                    @error('sliderInfo.title') <span class="red-text">{{ $message }}</span> @enderror
                                </div>

                                <div class="input-field col m12 s12">
                                    <textarea wire:model="sliderInfo.text" id="message"
                                        class="materialize-textarea"></textarea>
                                    <label class="active" for="message">Message</label>
                                    @error('sliderInfo.text') <span class="red-text">{{ $message }}</span> @enderror
                                </div>

                                <div class="input-field col m12 s12">
                                    <input wire:model="sliderInfo.button_name" id="btn-name" type="text"
                                        class="validate">
                                    <label class="active" for="btn-name">Button title</label>
                                    @error('sliderInfo.text') <span class="red-text">{{ $message }}</span> @enderror
                                </div>

                                <div class="input-field col m12 s12">
                                    <input wire:model="sliderInfo.button_url" id="btn-url" type="text" class="validate">
                                    <label class="active" for="btn-url">Button url</label>
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
                                    Submit
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
$wire.on('slider-info-created', () => {
    M.toast({
        html: 'created successfully'
    })
});

$wire.on('slider-info-creation-failed', () => {
    M.toast({
        html: 'creation unsuccessful'
    })
});
</script>
@endscript