<div>
    <div class="container">

        <h5 class="grey-text lighten-3 mt heading"><b>Add Event</b></h5>

        <div class="row">
            <div class="col m8 s12 white">
            <div class="custom-form z-depth-1">
                <form wire:submit.prevent="processInfo">
                    <div>
                        <div class="row">
                            <div class="col m12 s12">
                                <label>Cover Image</label>
                                <div class="file-field input-field">
                                    <div class="btn btn-small grey">
                                        <span>File</span>
                                        <input wire:model="eventArr.image_path" type="file">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                    @error('eventArr.image_path')
                                        <span class="red-text">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-field col m12 s12">
                                <input wire:model="eventArr.title" id="title" type="text" class="validate"
                                    maxlength="70" placeholder="&nbsp;">
                                <label class="active" for="title">Title</label>
                                @error('eventArr.title')
                                    <span class="red-text">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-field col m12 s12">
                                <input wire:model="eventArr.venue" id="venue" type="text" class="validate"
                                    maxlength="70" placeholder="&nbsp;">
                                <label class="active" for="venue">Venue</label>
                                @error('eventArr.venue')
                                    <span class="red-text">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-field col m12 s12">
                                <label class="active" for="date">Date</label>
                                <input type="date" wire:model="eventArr.date" placeholder="&nbsp;">

                                @error('eventArr.date')
                                    <span class="red-text">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-field col m12 s12">
                                <label class="active" for="time">Time</label>
                                <input type="time" class="" wire:model="eventArr.time" placeholder="&nbsp;">

                                @error('eventArr.time')
                                    <span class="red-text">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-field col s12">
                                <textarea wire:model="eventArr.text" maxlength="2048" id="text" class="materialize-textarea"></textarea>
                                <label for="text">Description</label>
                                @error('eventArr.text')
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
        $wire.on('event-created', () => {
            M.toast({
                html: 'created successfully'
            })
        });

        $wire.on('event-creation-failed', () => {
            M.toast({
                html: 'creation unsuccessful'
            })
        });
    </script>
@endscript
