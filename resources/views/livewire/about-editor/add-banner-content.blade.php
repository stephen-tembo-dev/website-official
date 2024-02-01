<div>
    <div class="container">

        <h5 class="grey-text lighten-3 mt heading"><b>About Page: Add Banner</b></h5>

        <div class="row">
            <div class="col m8 s12 white">
                <div class="custom-form z-depth-1">
                    <form wire:submit.prevent="processInfo">
                        <div>
                            <div class="row">
                                <div class="col m12 s12">
                                    <label>Cover Image</label>
                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <span>Image - 2:1</span>
                                            <input wire:model="bannerContent.image_path" type="file" required>
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                        @error('bannerContent.image_path')
                                            <span class="red-text">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="input-field col m12 s12">
                                    <input wire:model="bannerContent.title" id="title" type="text"
                                        class="validate" maxlength="70" required>
                                    <label class="active" for="title">Title</label>
                                    @error('bannerContent.title')
                                        <span class="red-text">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="input-field col m12 s12">
                                    <input wire:model="bannerContent.caption" id="caption" type="text"
                                        class="validate" maxlength="70" required>
                                    <label class="active" for="caption">Caption</label>
                                    @error('bannerContent.caption')
                                        <span class="red-text">{{ $message }}</span>
                                    @enderror
                                </div>
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
        $wire.on('banner-content-created', () => {
            M.toast({
                html: 'created successfully'
            })
        });

        $wire.on('banner-content-creation-failed', () => {
            M.toast({
                html: 'creation unsuccessful'
            })
        });
    </script>
@endscript
