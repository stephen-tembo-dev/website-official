<div>
    <div class="container">

        <h5 class="grey-text lighten-3 mt heading"><b>About Page: Add Main Content</b></h5>

        <div class="row">
            <div class="col m8 s12 white">
                <div class="custom-form z-depth-1">
                    <form wire:submit.prevent="processInfo">
                        <div>
                            <div class="row">
                                <div class="input-field col m12 s12">
                                    <input wire:model="mainContent.title" id="title" type="text" class="validate"
                                        maxlength="70" required>
                                    <label class="active" for="title">Title</label>
                                    @error('mainContent.title')
                                        <span class="red-text">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="input-field col s12">
                                    <textarea wire:model="mainContent.text" maxlength="2048" id="textarea2" class="materialize-textarea" required></textarea>
                                    <label for="textarea2">Text</label>
                                    @error('mainContent.text')
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
        $wire.on('main-content-created', () => {
            M.toast({
                html: 'created successfully'
            })
        });

        $wire.on('main-content-creation-failed', () => {
            M.toast({
                html: 'creation unsuccessful'
            })
        });
    </script>
@endscript
