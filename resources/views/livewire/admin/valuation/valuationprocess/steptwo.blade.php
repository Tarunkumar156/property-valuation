<div class="card mt-3 shadow-sm  setup-content {{ $currentStep != 2 ? 'display-none' : '' }}" id="step2">
    <h5 class="card-header theme_bg_color text-white">APARTMENT BUILDING</h5>

    <div class="card-body">
        <div class="row g-3">
            @include('helper.formhelper.form', [
                'type' => 'text',
                'fieldname' => 'nameofapartment',
                'labelname' => 'NAME OF THE APARTMENT:',
                'labelidname' => 'nameofapartmentid',
                'required' => true,
                'col' => 'col-md-6',
            ])
            @include('helper.formhelper.form', [
                'type' => 'select',
                'default_option' => 'Select  an option',
                'fieldname' => 'descriptionoflocality',
                'labelname' => 'DESCRIPTION OF THE LOCALITY:',
                'labelidname' => 'descriptionoflocalityid',
                'option' => config('archive.descriptionoflocality'),
                'required' => false,
                'col' => 'col-md-6',
            ])
            <div class="col-md-6">
                <label for="yearofconstructionid" class="form-label">YEAR OF CONSTRUCTION</label>
                @if (false)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model='yearofconstruction' type="number" class="form-control" id="yearofconstructionid">
                @error('yearofconstruction')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            @include('helper.formhelper.form', [
                'type' => 'text',
                'fieldname' => 'nooffloors',
                'labelname' => 'NUMBER OF FLOORS:',
                'labelidname' => 'nooffloorsid',
                'required' => false,
                'col' => 'col-md-6',
            ])
            @include('helper.formhelper.form', [
                'type' => 'text',
                'fieldname' => 'typeofstructure',
                'labelname' => 'TYPE OF STRUCTURE:',
                'labelidname' => 'typeofstructureid',
                'required' => false,
                'col' => 'col-md-6',
            ])
            @include('helper.formhelper.form', [
                'type' => 'text',
                'fieldname' => 'noofunits',
                'labelname' => 'NUMBER OF DWELLING UNITS IN THE BUILDING:',
                'labelidname' => 'noofunitsid',
                'required' => false,
                'col' => 'col-md-6',
            ])
            @include('helper.formhelper.form', [
                'type' => 'select',
                'default_option' => 'Select  an option',
                'fieldname' => 'qualityofconstruction',
                'labelname' => 'QUALITY OF CONSTRUCTION:',
                'labelidname' => 'qualityofconstructionid',
                'option' => config('archive.quality'),
                'required' => false,
                'col' => 'col-md-6',
            ])
            @include('helper.formhelper.form', [
                'type' => 'select',
                'default_option' => 'Select  an option',
                'fieldname' => 'appearanceofconstruction',
                'labelname' => 'APPEARANCE OF THE BUILDING:',
                'labelidname' => 'appearanceofconstructionid',
                'option' => config('archive.quality'),
                'required' => false,
                'col' => 'col-md-6',
            ])
            @include('helper.formhelper.form', [
                'type' => 'select',
                'default_option' => 'Select  an option',
                'fieldname' => 'maintenanceofbuilding',
                'labelname' => 'MAINTENANCE OF THE BUILDING:',
                'labelidname' => 'maintenanceofbuildingid',
                'option' => config('archive.quality'),
                'required' => false,
                'col' => 'col-md-6',
            ])
            <h5 class="card-header theme_bg_color text-white">Facilities Available</h5>
            <div class="col-md-4 mb-3">
                <label for="liftid" class="form-label">Lift:</label>
                <div class="d-flex gap-4">
                    <div class="text-danger fw-bold">No</div>
                    <div>
                        @if (false)
                            <span class="text-danger fw-bold">*</span>
                        @endif
                        <div class="form-check form-switch">
                            <input wire:model='is_lift' class="form-check-input" id="liftid" type="checkbox"
                                role="switch" id="flexSwitchCheckDefault" />
                        </div>
                    </div>
                    <div>
                        <span class="text-success fw-bold">YES</span>
                    </div>
                </div>
                @error('is_lift')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label for="watersupplyid" class="form-label">Protected Water Supply:</label>
                <div class="d-flex gap-4">
                    <div class="text-danger fw-bold">Not Provided</div>
                    <div>
                        @if (false)
                            <span class="text-danger fw-bold">*</span>
                        @endif
                        <div class="form-check form-switch">
                            <input wire:model='is_watersupply' class="form-check-input" id="watersupplyid"
                                type="checkbox" role="switch" id="flexSwitchCheckDefault" />
                        </div>
                    </div>
                    <div>
                        <span class="text-success fw-bold">Provided</span>
                    </div>
                </div>
                @error('is_watersupply')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label for="underwaterid" class="form-label">Underground Sewerage:</label>
                <div class="d-flex gap-4">
                    <div class="text-danger fw-bold">No</div>
                    <div>
                        @if (false)
                            <span class="text-danger fw-bold">*</span>
                        @endif
                        <div class="form-check form-switch">
                            <input wire:model='is_underwater' class="form-check-input" id="underwaterid" type="checkbox"
                                role="switch" id="flexSwitchCheckDefault" />
                        </div>
                    </div>
                    <div>
                        <span class="text-success fw-bold">YES</span>
                    </div>
                </div>
                @error('is_underwater')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label for="carparkingid" class="form-label">Car Parking:</label>
                <div class="d-flex gap-4">
                    <div class="text-danger fw-bold">Open</div>
                    <div>
                        @if (false)
                            <span class="text-danger fw-bold">*</span>
                        @endif
                        <div class="form-check form-switch">
                            <input wire:model='is_carparking' class="form-check-input" id="carparkingid" type="checkbox"
                                role="switch" id="flexSwitchCheckDefault" />
                        </div>
                    </div>
                    <div>
                        <span class="text-success fw-bold">Close</span>
                    </div>
                </div>
                @error('is_carparking')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label for="compoundwallid" class="form-label">Is Compound wall:</label>
                <div class="d-flex gap-4">
                    <div class="text-danger fw-bold">Not Provided</div>
                    <div>
                        @if (false)
                            <span class="text-danger fw-bold">*</span>
                        @endif
                        <div class="form-check form-switch">
                            <input wire:model='is_compoundwall' class="form-check-input" id="compoundwallid"
                                type="checkbox" role="switch" id="flexSwitchCheckDefault" />
                        </div>
                    </div>
                    <div>
                        <span class="text-success fw-bold">Provided</span>
                    </div>
                </div>
                @error('is_compoundwall')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label for="pavementid" class="form-label">Is pavement laid around the Building:<label>
                        <div class="d-flex gap-4 mt-1">
                            <div class="text-danger fw-bold">Not Provided</div>
                            <div>
                                @if (false)
                                    <span class="text-danger fw-bold">*</span>
                                @endif
                                <div class="form-check form-switch">
                                    <input wire:model='is_pavement' class="form-check-input" id="pavementid"
                                        type="checkbox" role="switch" id="flexSwitchCheckDefault" />
                                </div>
                            </div>
                            <div>
                                <span class="text-success fw-bold">Provided</span>
                            </div>
                        </div>
                        @error('is_pavement')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
            </div>
        </div>
        <div class="float-end d-flex gap-1">
            <button class="btn  btn-sm btn-secondary text-white float-end mt-3" type="button"
                wire:click="back(1)">back</button>
            <button class="btn btn-sm theme_bg_color text-white float-end mt-3" type="button"
                wire:click="secondStepSubmit">Next</button>
        </div>
    </div>
    <script>
        function scrolltop() {
            const top = document.getElementById('step2');
            top.scrollTop = 10;
        }
        window.onload = scrolltop();
        $('form').on('focus', 'input[type=number]', function(e) {
            $(this).on('wheel.disableScroll', function(e) {
                e.preventDefault()
            })
        })
        $('form').on('blur', 'input[type=number]', function(e) {
            $(this).off('wheel.disableScroll')
        })
    </script>
</div>
