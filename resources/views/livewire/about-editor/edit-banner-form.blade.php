<div>
    <form wire:submit="updateBanner()">
        <div class="custom-form z-depth-1">
            <div>
                <label for="">Cover Image</label>
                <div class="file-field input-field">
                    <div class="btn btn-small grey">
                        <span>File</span>
                        <input type="file" wire:model="image">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="About Us" id="about_us" type="text" class="validate">
                    <label for="about_us">Banner Title</label>
                </div>
                <div class="input-field col s6">
                    <input id="last_name" type="text" class="validate">
                    <label for="last_name">Last Name</label>
                </div>
            </div>
        </div>
    </form>

</div>