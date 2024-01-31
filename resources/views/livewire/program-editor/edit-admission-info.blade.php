<div>
    <div class="container">

        <h5 class="grey-text lighten-3 mt heading"><b>Update admission info</b></h5>

        <div class="row">

            <div class="col m8 s12 white">
                <div class="custom-form z-depth-1">
                    <form wire:submit.prevent="updateInfo">
                        <div>
                            <div class="row">

                                <div class="input-field col m12 s12">
                                    <textarea wire:model="admissionInfo.entry_requirements" id="message" placeholder="Entry requirements"
                                              class="materialize-textarea"></textarea>

                                    @error('admissionInfo.entry_requirements') <span class="red-text">{{ $message }}</span> @enderror
                                </div>

                                <div class="input-field col m12 s12">
                                    <textarea wire:model="admissionInfo.how_to_apply" id="message" placeholder="How to apply"
                                              class="materialize-textarea"></textarea>
                                    @error('admissionInfo.how_to_apply') <span class="red-text">{{ $message }}</span> @enderror
                                </div>

                                <div class="input-field col m12 s12">
                                    <textarea wire:model="admissionInfo.fees_and_scholarships" id="message" placeholder="Fees & Scholarships"
                                              class="materialize-textarea"></textarea>
                                    @error('admissionInfo.fees_and_scholarships"') <span class="red-text">{{ $message }}</span> @enderror
                                </div>


                                <div class="input-field col m12 s12">
                                    <textarea wire:model="admissionInfo.accomodation" id="message" placeholder="Accomodation"
                                              class="materialize-textarea"></textarea>
                                    @error('admissionInfo.accomodation') <span class="red-text">{{ $message }}</span> @enderror
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
    $wire.on('admission-info-updated', () => {
        M.toast({
            html: 'updated successfully'
        })
    });

    $wire.on('admission-info-update-failed', () => {
        M.toast({
            html: 'update unsuccessful'
        })
    });
</script>
@endscript
