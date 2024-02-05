<div>
    <div class="container">

        <h5 class="grey-text lighten-3 mt heading"><b>Add Publication</b></h5>

        <div class="row">
            <div class="col m8 s12 white">
                <div class="custom-form z-depth-1">
                    <form wire:submit.prevent="processInfo">
                        <div>
                            <div class="row">
                                <div class="input-field col m12 s12">
                                    <input wire:model="publicationArr.title" id="title" type="text"
                                        class="validate" maxlength="255" required>
                                    <label class="active" for="title">Title</label>
                                    @error('publicationArr.title')
                                        <span class="red-text">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input-field col m12 s12">
                                    <input wire:model="publicationArr.author" id="author" type="text"
                                        class="validate" maxlength="255" required>
                                    <label class="active" for="author">Author</label>
                                    @error('publicationArr.author')
                                        <span class="red-text">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input-field col m12 s12">
                                    <input wire:model="publicationArr.year" id="year" type="text"
                                        class="validate" maxlength="4" required>
                                    <label class="active" for="year">Year</label>
                                    @error('publicationArr.year')
                                        <span class="red-text">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input-field col m12 s12">
                                    <input wire:model="publicationArr.url" id="url" type="text"
                                        class="validate" maxlength="255" required>
                                    <label class="active" for="url">URL</label>
                                    @error('publicationArr.url')
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
        $wire.on('publication-created', () => {
            M.toast({
                html: 'created successfully'
            })
        });

        $wire.on('publication-creation-failed', () => {
            M.toast({
                html: 'creation unsuccessful'
            })
        });
    </script>
@endscript
