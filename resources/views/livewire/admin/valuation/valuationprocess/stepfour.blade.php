<div class="card mt-3 shadow-sm  setup-content {{ $currentStep != 4 ? 'display-none' : '' }}" id="step4">
    <h5 class="card-header theme_bg_color text-white">MARKETABILITY</h5>
    <div class="card-body">
        <div class="row g-3">
            @include('helper.formhelper.form', [
                'type' => 'select',
                'default_option' => 'Select  an option',
                'fieldname' => 'marketability',
                'labelname' => 'HOW IS THE MARKETABILITY?:',
                'labelidname' => 'marketabilityid',
                'option' => config('archive.quality'),
                'required' => true,
                'col' => 'col-md-6',
            ])
            <div class="col-md-6">
                <label for="extrapotentialvalueid" class="form-label">WHAT ARE THE FACTORS FAVORING FOR AN EXTRA POTENTIAL
                    VALUE?</label>
                @if (false)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model='extrapotentialvalue' type="number" class="form-control" id="extrapotentialvalueid">
                @error('extrapotentialvalue')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="negativefactorsid" class="form-label">ANY NEGATIVE FACTORS ARE OBSERVED WHICH AFFECT THE
                    MARKET VALUE IN GENERAL?</label>
                @if (false)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model='negativefactors' type="number" class="form-control" id="negativefactorsid">
                @error('negativefactors')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <h5 class="card-header theme_bg_color text-white">RATE</h5>
    <div class="card-body">
        <div class="row g-3">
            <h5 class="card-header theme_bg_color text-white">AFTER ANALYZING THE COMPARABLE SALE INSTANCES, WHAT IS THE
                COMPOSITE RATE FOR A SIMILAR FLAT WITH SAME SPECIFICATION IN THE ADJOINING LOCALITY?</h5>
            <div class="col-md-6">
                @if (false)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model='compositerate' type="number" class="form-control" id="compositerateid">
                @error('compositerate')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <h5 class="card-header theme_bg_color text-white">ASSUMING IT IS A NEW CONSTRUCTION, WHAT IS THE ADOPTED
                BASIC COMPOSITE RATE OF THE FLAT UNDER VALUATION AFTER COMPARING WITH THE SPECIFICATIONS AND OTHER
                FACTORS WITH THE FLAT UNDER COMPARISON</h5>
            <div class="col-md-6">
                <label for="adoptedcompositerateminid" class="form-label">MINIMUM COMPOSITE RATE(Rs/Sqft)</label>
                @if (true)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model='adoptedcompositeratemin' type="number" class="form-control"
                    id="adoptedcompositerateminid">
                @error('adoptedcompositeratemin')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="adoptedcompositeratemaxid" class="form-label">MAXIMUM COMPOSITE RATE(Rs/Sqft)</label>
                @if (true)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model='adoptedcompositeratemax' type="number" class="form-control"
                    id="adoptedcompositeratemaxid">
                @error('adoptedcompositeratemax')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <h5 class="card-header theme_bg_color text-white">Break - up for the rate</h5>
            <div class="col-md-6">
                <label for="buildingandservicesid" class="form-label">BUILDING + SERVICES(Rs/Sqft):</label>
                @if (false)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model='buildingandservices' type="number" class="form-control" id="buildingandservicesid">
                @error('buildingandservices')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="landandothersid" class="form-label">LAND + OTHERS(Rs/Sqft):</label>
                @if (false)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model='landandothers' type="number" class="form-control" id="landandothersid">
                @error('landandothers')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="registrarrateid" class="form-label">GUIDELINE RATE OBTAINED FROM THE REGISTRAR’S OFFICE (AN
                    EVIDENCE THEREOF TO BE ENCLOSED)[AS ON 2017](Rs/Sqft):</label>
                @if (true)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model='registrarrate' type="number" class="form-control" id="registrarrateid">
                @error('registrarrate')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <h5 class="card-header theme_bg_color text-white">COMPOSITE RATE ADOPTED AFTER DEPRECIATION </h5>
            <div class="col-md-6">
                <label for="ageofbuildingid" class="form-label">AGE OF THE BUILDING:</label>
                @if (true)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model='ageofbuilding' type="number" class="form-control" id="ageofbuildingid">
                @error('ageofbuilding')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="lifeofbuildingid" class="form-label">LIFE OF THE BUILDING ESTIMATED:</label>
                @if (true)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model='lifeofbuilding' type="number" class="form-control" id="lifeofbuildingid">
                @error('lifeofbuilding')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="salvagevalueid" class="form-label">DEPRECIATION PERCENTAGE ASSUMING THE SALVAGE VALUE AS
                    10%:</label>
                @if (false)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model='salvagevalue' type="number" class="form-control" id="salvagevalueid">
                @error('salvagevalue')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="depreciatedratioid" class="form-label">DEPRECIATED RATIO OF THE BUILDING:</label>
                @if (false)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model='depreciatedratio' type="text" class="form-control" id="depreciatedratioid">
                @error('depreciatedratio')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <h5 class="card-header theme_bg_color text-white">Depreciated building rate</h5>
            <div class="col-md-6">
                <label for="currentmarketrateid" class="form-label">CURRENT MARKET RATE OF
                    CONSTRUCTION(Rs/Sqst):</label>
                @if (false)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model="currentmarketrate" type="number" class="form-control" id='currentmarketrateid'>
                @error('currentmarketrate')
                    <span class="text-danger error">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="servicelifebuildingid" class="form-label">SERVICE LIFE OF BUILDING:</label>
                @if (false)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model="servicelifebuilding" type="number" class="form-control"
                    id='servicelifebuildingid'>
                @error('servicelifebuilding')
                    <span class="text-danger error">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="depreciationaccountedid" class="form-label">DEPRECIATION ACCOUNTED[NORMAL]:</label>
                @if (false)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model="depreciationaccounted" type="number" class="form-control"
                    id='depreciationaccountedid'>
                @error('depreciationaccounted')
                    <span class="text-danger error">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="depreciatedrateconstructionid" class="form-label">DEPRECIATED RATE OF
                    CONSTRUCTION(Rs.):</label>
                @if (true)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model="depreciatedrateconstruction" type="number" class="form-control"
                    id='depreciatedrateconstructionid'>
                @error('depreciatedrateconstruction')
                    <span class="text-danger error">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="adoptedbasiccompositerateid" class="form-label">ADOPTED MARKET RATE OF LAND(Rs.):</label>
                @if (true)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model="adoptedbasiccompositerate" type="number" class="form-control"
                    id='adoptedbasiccompositerateid'>
                @error('adoptedbasiccompositerate')
                    <span class="text-danger error">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="replacementcostid" class="form-label">REPLACEMENT COST OF FLAT WITH SERVICES [V-3.
                    (I)]:</label>
                <input type="number" value={{ $plinthareaofflat * $depreciatedrateconstruction }}
                    class="form-control" disabled readonly>
            </div>
            @if ($adoptedbasiccompositerate)
                <div class="col-md-6">
                    <label for="estimatedvalueid" class="form-label">ESTIMATED VALUE OF UDS. LAND [V-3. (ii)]:</label>
                    <input type="number" value={{ $adoptedbasiccompositerate * $extentofsite }} class="form-control"
                        disabled readonly>
                </div>
            @endif
            <h5 class="card-header theme_bg_color text-white">TOTAL COMPOSITE RATE ARRIVED FOR VALUATION</h5>
            <div class="col-md-6">
                <label for="depreciatedbuildingrateid" class="form-label">DEPRECIATED BUILDING RATE [VI-(A.)]:</label>
                @if (false)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model='depreciatedbuildingrate' type="number" class="form-control"
                    id="depreciatedbuildingrateid">
                @error('depreciatedbuildingrate')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            @if ($adoptedbasiccompositerate)
                <div class="col-md-6">
                    <label for="rateforlandandothersid" class="form-label">RATE FOR LAND & OTHERS [VI-(B.)]:</label>
                    <input type="number"
                        value="{{ round(($adoptedbasiccompositerate * $extentofsite) / $plinthareaofflat) }}"
                        class="form-control" id="rateforlandandothersid" readonly>
                </div>
            @endif
            <div class="col-md-6">
                <label for="totalcompositerateid" class="form-label">TOTAL COMPOSITE RATE(Rs.):</label>
                @if (true)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model='totalcompositerate' type="number" class="form-control"
                    id="totalcompositerateid">
                @error('totalcompositerate')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="sayid" class="form-label">SAY(Rs.):</label>
                @if (true)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model='say' type="number" class="form-control" id="sayid">
                @error('say')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <h5 class="card-header theme_bg_color text-white">Total composite rate - valuation based on Tamilnadu
                Government Guide lines and rate of Cost of construction available in PWD</h5>
            <h5 class="card-header theme_bg_color text-white">Depreciated building rate</h5>
            <div class="col-md-6">
                <label for="pwdrateid" class="form-label">PWD RATE OF CONSTRUCTION(Rs/Sqst):</label>
                @if (false)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model="pwdrate" type="number" class="form-control" id='pwdrateid'>
                @error('pwdrate')
                    <span class="text-danger error">{{ $message }}</span>
                @enderror
            </div>
            @if ($pwdrate)
                <div class="col-md-6">
                    <label for="incrementalid" class="form-label">INCREMENTAL FOR CITY AREA:</label>
                    <input type="number" value="{{ 1.2 * $pwdrate }}" class="form-control" id='incrementalid'
                        readonly>
                </div>
            @endif
            <div class="col-md-6">
                <label for="pwdservicelifebuildingid" class="form-label">SERVICE LIFE OF BUILDING:</label>
                @if (false)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model="pwdservicelifebuilding" type="number" class="form-control"
                    id='pwdservicelifebuildingid'>
                @error('pwdservicelifebuilding')
                    <span class="text-danger error">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="pwddepreciationaccountedid" class="form-label">DEPRECIATION ACCOUNTED[NORMAL]:</label>
                @if (false)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model="pwddepreciationaccounted" type="number" class="form-control"
                    id='pwddepreciationaccountedid'>
                @error('pwddepreciationaccounted')
                    <span class="text-danger error">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="pwddepreciatedrateconstructionid" class="form-label">DEPRECIATED RATE OF
                    CONSTRUCTION(Rs.):</label>
                @if (true)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model="pwddepreciatedrateconstruction" type="number" class="form-control"
                    id='pwddepreciatedrateconstructionid'>
                @error('pwddepreciatedrateconstruction')
                    <span class="text-danger error">{{ $message }}</span>
                @enderror
            </div>
            @if ($pwddepreciatedrateconstruction)
                <div class="col-md-6">
                    <label for="pwdreplacementcostofflatid" class="form-label">REPLACEMENT COST OF FLAT WITH SERVICES
                        [V-3. (I)](Rs.):</label>
                    <input type="number" value="{{ $plinthareaofflat * $pwddepreciatedrateconstruction }}"
                        class="form-control" id="pwdreplacementcostofflatid" readonly>
                </div>
            @endif
            @if ($registrarrate)
                <div class="col-md-6">
                    <label for="pwdestimatedvalueofusdid" class="form-label">ESTIMATED VALUE OF UDS. LAND [V-3.
                        (II)](Rs.):</label>
                    <input type="number" value="{{ $registrarrate * $extentofsite }}" class="form-control"
                        id="pwdestimatedvalueofusdid" readonly>
                </div>
            @endif
        </div>
        <div class="float-end d-flex gap-1">
            <button class="btn  btn-sm btn-secondary text-white float-end mt-3" type="button"
                wire:click="back(3)">back</button>
            <button class="btn btn-sm theme_bg_color text-white float-end mt-3" type="button"
                wire:click="fourthStepSubmit">Next</button>
        </div>
    </div>
    <script>
        function scrolltop() {
            const top = document.getElementById('step4');
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
