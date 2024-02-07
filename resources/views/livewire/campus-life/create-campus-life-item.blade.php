<div>
    <div class="container">

        <h5 class="grey-text lighten-3 mt heading"><b>Campus Life: Add Item</b></h5>

        <div class="row">
            <div class="col m8 s12 white">
                <form wire:submit.prevent="processInfo">
                    <div>
                        <div class="row mt-sm">
                            <div class="col s12">
                                <label>Item Type</label>
                                <div class="input-field">
                                    <select wire:model="itemArr.type" class="browser-default">
                                        <option disabled selected>Choose item type</option>
                                        @foreach (\App\Enums\CampusLifeItemType::toArray() as $type)
                                            <option value="{{ $type }}">{{ $type }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="col s12">
                                <label>Image</label>
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>Image - 2:1</span>
                                        <input wire:model="itemArr.image_path" type="file" required>
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                    @error('itemArr.image_path')
                                        <span class="red-text">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-field col s12">
                                <input wire:model="itemArr.title" id="title" type="text" class="validate"
                                    maxlength="70" required>
                                <label class="active" for="title">Title</label>
                                @error('itemArr.title')
                                    <span class="red-text">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-field col s12">
                                <textarea wire:model="itemArr.text" maxlength="255" id="textarea2" class="materialize-textarea" required></textarea>
                                <label for="textarea2">Text</label>
                                @error('itemArr.text')
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

@script
    <script>
        $wire.on('campus-life-item-created', () => {
            M.toast({
                html: 'created successfully'
            })
        });

        $wire.on('campus-life-item-creation-failed', () => {
            M.toast({
                html: 'creation unsuccessful'
            })
        });
    </script>
@endscript
