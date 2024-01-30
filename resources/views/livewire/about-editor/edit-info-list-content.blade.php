<div>
    <div class="container">

        <h5 class="grey-text lighten-3 mt heading"><b>About Page: Edit Info List Content</b></h5>

        <div class="row">
            <div class="col m8 s12 white">
                <div class="custom-form z-depth-1">
                    <form wire:submit.prevent="processInfo">
                        <div>
                            <div class="row">
                                <div class="input-field col m12 s12">
                                    <input wire:model="listContentArr.title" id="title" type="text" class="validate"
                                        maxlength="70">
                                    <label class="active" for="title">Title</label>
                                    @error('listContentArr.title')
                                    <span class="red-text">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="input-field col s12">
                                    <textarea wire:model="listContentArr.text" maxlength="2048" id="text"
                                        class="materialize-textarea"></textarea>
                                    <label for="text">Text</label>
                                    @error('listContentArr.text')
                                    <span class="red-text">{{ $message }}</span>
                                    @enderror
                                </div>
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
$wire.on('list-content-updated', () => {
    M.toast({
        html: 'updated successfully'
    })
});

$wire.on('list-content-update-failed', () => {
    M.toast({
        html: 'update unsuccessful'
    })
});
</script>
@endscript