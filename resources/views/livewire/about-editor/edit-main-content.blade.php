<div>
    <div class="container">

        <h5 class="grey-text lighten-3 mt heading"><b>About Page: Edit Main Content</b></h5>

        <div class="row">
            <div class="col m8 s12 white">

                <form wire:submit.prevent="processInfo">
                    <div>
                        <div class="row">
                            <div class="input-field col m12 s12">
                                <input wire:model="mainContentArr.title" id="title" type="text" class="validate"
                                    maxlength="70">
                                <label class="active" for="title">Title</label>
                                @error('mainContentArr.title')
                                    <span class="red-text">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-field col s12">
                                <textarea wire:model="mainContentArr.text" maxlength="2048" id="textarea2" class="materialize-textarea"></textarea>
                                <label for="textarea2">Text</label>
                                @error('mainContentArr.text')
                                    <span class="red-text">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <button style="border-radius: 8px;" class="btn btn-small waves-effect waves-light black"
                            type="submit" name="action">
                            Update Main Content
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@script
    <script>
        $wire.on('main-content-updated', () => {
            M.toast({
                html: 'updated successfully'
            })
        });

        $wire.on('main-content-update-failed', () => {
            M.toast({
                html: 'update unsuccessful'
            })
        });
    </script>
@endscript
