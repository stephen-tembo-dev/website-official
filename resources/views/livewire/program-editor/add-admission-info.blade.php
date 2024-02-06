<div>
    <div class="container">

        <h5 class="grey-text lighten-3 mt heading"><b>Add admission info</b></h5>

        <div class="row">

            <div class="col m8 s12 white">
                <div class="custom-form z-depth-1">
                    <form wire:submit.prevent="processInfo">
                        <div>
                            <div class="row">

                                <div class="input-field col s12">
                                    <select wire:model="admissionInfo.category">
                                        <option value="" disabled selected>Select Category</option>
                                        <option value="" selected>Select Category</option>
                                        @foreach($categories as $category)
                                          <option value="{{$category['id']}}">{{$category['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="input-field col m12 s12">
                                    <textarea wire:model="admissionInfo.entry_requirements" id="message"
                                              class="materialize-textarea"></textarea>
                                    <label class="active" for="message">Entry requirements</label>
                                    @error('admissionInfo.entry_requirements') <span class="red-text">{{ $message }}</span> @enderror
                                </div>

                                <div class="input-field col m12 s12">
                                    <textarea wire:model="admissionInfo.how_to_apply" id="message"
                                              class="materialize-textarea"></textarea>
                                    <label class="active" for="message">How to apply</label>
                                    @error('admissionInfo.how_to_apply') <span class="red-text">{{ $message }}</span> @enderror
                                </div>

                                <div class="input-field col m12 s12">
                                    <textarea wire:model="admissionInfo.fees_and_scholarships" id="message"
                                              class="materialize-textarea"></textarea>
                                    <label class="active" for="message">Fees & Scholarships</label>
                                    @error('admissionInfo.fees_and_scholarships"') <span class="red-text">{{ $message }}</span> @enderror
                                </div>


                                <div class="input-field col m12 s12">
                                    <textarea wire:model="admissionInfo.accomodation" id="message"
                                              class="materialize-textarea"></textarea>
                                    <label class="active" for="message">Accomodation</label>
                                    @error('admissionInfo.accomodation') <span class="red-text">{{ $message }}</span> @enderror
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
    $wire.on('admission-info-created', () => {
        M.toast({
            html: 'created successfully'
        })
    });

    $wire.on('admission-info-creation-failed', () => {
        M.toast({
            html: 'creation unsuccessful'
        })
    });
</script>
@endscript
