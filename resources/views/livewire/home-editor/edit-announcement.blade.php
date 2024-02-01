<div>
    <div class="container">

        <h5 class="grey-text lighten-3 mt heading"><b>Edit Announcement</b></h5>

        <div class="row">
            <div class="col m8 s12 white">
            <div class="custom-form z-depth-1">
                <form wire:submit.prevent="processInfo">
                    <div>
                        <div class="row">
                            <div class="input-field col m12 s12">
                                <input wire:model="announcementArr.title" id="title" type="text" class="validate" placeholder="Title" required
                                    maxlength="70">
                                @error('announcementArr.title')
                                    <span class="red-text">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-field col s12">
                                <textarea wire:model="announcementArr.text" maxlength="2048" id="text" class="materialize-textarea" placeholder="Anouncement" required></textarea>
                                @error('announcementArr.text')
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
        $wire.on('announcement-updated', () => {
            M.toast({
                html: 'updated successfully'
            })
        });

        $wire.on('announcement-update-failed', () => {
            M.toast({
                html: 'update unsuccessful'
            })
        });
    </script>
@endscript
