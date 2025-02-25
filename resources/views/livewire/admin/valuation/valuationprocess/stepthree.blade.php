<div class="card mt-3 shadow-sm  setup-content {{ $currentStep != 3 ? 'display-none' : '' }}" id="step3">
    <h5 class="card-header theme_bg_color text-white">Flat</h5>
    <div class="card-body">
        <div class="row g-3">
            @include('helper.formhelper.form', [
                'type' => 'text',
                'fieldname' => 'flatfloor',
                'labelname' => 'THE FLOOR ON WHICH THE FLAT IS SITUATED:',
                'labelidname' => 'flatfloorid',
                'required' => true,
                'col' => 'col-md-6',
            ])
            @include('helper.formhelper.form', [
                'type' => 'text',
                'fieldname' => 'doornoofflat',
                'labelname' => 'DOOR NO. OF THE FLAT:',
                'labelidname' => 'doornoofflatid',
                'required' => true,
                'col' => 'col-md-6',
            ])
            <h5 class="card-header theme_bg_color text-white">Specifications of the flat</h5>
            @include('helper.formhelper.form', [
                'type' => 'text',
                'fieldname' => 'roof',
                'labelname' => 'ROOF:',
                'labelidname' => 'roofid',
                'required' => false,
                'col' => 'col-md-6',
            ])
            @include('helper.formhelper.form', [
                'type' => 'text',
                'fieldname' => 'flooring',
                'labelname' => 'FLOORING:',
                'labelidname' => 'flooringid',
                'required' => false,
                'col' => 'col-md-6',
            ])
            @include('helper.formhelper.form', [
                'type' => 'text',
                'fieldname' => 'doors',
                'labelname' => 'DOORS:',
                'labelidname' => 'doorsid',
                'required' => false,
                'col' => 'col-md-6',
            ])
            @include('helper.formhelper.form', [
                'type' => 'text',
                'fieldname' => 'windows',
                'labelname' => 'WINDOWS:',
                'labelidname' => 'windowsid',
                'required' => false,
                'col' => 'col-md-6',
            ])
            @include('helper.formhelper.form', [
                'type' => 'text',
                'fieldname' => 'fittings',
                'labelname' => 'FITTINGS:',
                'labelidname' => 'fittingsid',
                'required' => false,
                'col' => 'col-md-6',
            ])
            @include('helper.formhelper.form', [
                'type' => 'text',
                'fieldname' => 'finishing',
                'labelname' => 'FINISHING:',
                'labelidname' => 'finishingid',
                'required' => false,
                'col' => 'col-md-6',
            ])
            <h5 class="card-header theme_bg_color text-white">House Tax</h5>
            @include('helper.formhelper.form', [
                'type' => 'text',
                'fieldname' => 'assessmentno',
                'labelname' => 'ASSESSMENT NO:',
                'labelidname' => 'assessmentnoid',
                'required' => false,
                'col' => 'col-md-6',
            ])
            @include('helper.formhelper.form', [
                'type' => 'text',
                'fieldname' => 'taxpaidname',
                'labelname' => 'TAX PAID IN THE NAME OF:',
                'labelidname' => 'taxpaidnameid',
                'required' => false,
                'col' => 'col-md-6',
            ])
            @include('helper.formhelper.form', [
                'type' => 'text',
                'fieldname' => 'taxamount',
                'labelname' => 'TAX AMOUNT:',
                'labelidname' => 'taxamountid',
                'required' => false,
                'col' => 'col-md-6',
            ])
            @include('helper.formhelper.form', [
                'type' => 'text',
                'fieldname' => 'electricityserviceconnectionno',
                'labelname' => 'ELECTRICITY SERVICE CONNECTION NO.:',
                'labelidname' => 'electricityserviceconnectionnoid',
                'required' => false,
                'col' => 'col-md-6',
            ])
            @include('helper.formhelper.form', [
                'type' => 'text',
                'fieldname' => 'metercardname',
                'labelname' => 'METER CARD IS IN THE NAME OF:',
                'labelidname' => 'metercardnameid',
                'required' => false,
                'col' => 'col-md-6',
            ])
            @include('helper.formhelper.form', [
                'type' => 'text',
                'fieldname' => 'maintenanceofflat',
                'labelname' => 'HOW IS THE MAINTENANCE OF THE FLAT?:',
                'labelidname' => 'maintenanofflatid',
                'required' => false,
                'col' => 'col-md-6',
            ])
            <h5 class="card-header theme_bg_color text-white">Sale Deed executed in the name of</h5>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered text-center p-0 m-0 w-100">
                        <thead class="text-white theme_bg_color">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">S/D/W Of</th>
                                <th class="text-center" style="width: 8%;">
                                    <button wire:click="addsalesdeednames()" type="button"
                                        class="btn btn-sm btn-success  shadow">Add <i
                                            class="bi bi-plus-circle"></i></button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salesdeeednamelist as $key => $eachsalesdeeednamelist)
                                <tr>
                                    <td>
                                        <input wire:model.lazy="salesdeeednamelist.{{ $key }}.name"
                                            type="text" class="form-control">
                                        @error('salesdeeednamelist.' . $key . '.name')
                                            <span class="text-danger error">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input wire:model.lazy="salesdeeednamelist.{{ $key }}.sdof"
                                            type="text" class="form-control">
                                        @error('salesdeeednamelist.' . $key . '.sdof')
                                            <span class="text-danger error">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td class="text-center">

                                        @if ($salesdeeedbutton == 0)
                                            <button wire:click.prevent="removesalesdeedname({{ $key }})"
                                                class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i> </button>
                                        @elseif($key + 1 > $salesdeeedbutton)
                                            <button wire:click.prevent="removesalesdeedname({{ $key }})"
                                                class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i> </button>
                                        @else
                                            -
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <label for="undividedareaoflandid" class="form-label">WHAT IS THE UNDIVIDED AREA OF LAND (UDS) AS PER
                    SALE DEED?</label>
                @if (false)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input type="number" value="{{ $extentofsite }}" class="form-control" id="undividedareaoflandid"
                    readonly>
            </div>
            @if ($extentofsite)
                <div class="col-md-6">
                    <label class="form-label">WHAT IS THE UNDIVIDED AREA OF LAND (UDS) AS PER SALE DEED?(in Sqm)</label>
                    <input type="number" value={{ round($extentofsite / 10.764, 6) }} class="form-control" disabled
                        readonly>
                </div>
            @endif
            <h5 class="card-header theme_bg_color text-white">WHAT IS THE PLINTH AREA OF THE FLAT?</h5>
            <div class="col-md-6">
                <label for="builtupareaid" class="form-label">SUPER BUILT-UP AREA (INCLUDING COMMON AREAS) (in
                    Sqft)</label>
                @if (true)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model='builtuparea' type="number" class="form-control" id="builtupareaid">
                @error('builtuparea')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            @if ($builtuparea)
                <div class="col-md-6">
                    <label class="form-label">SUPER BUILT-UP AREA (in Sqm)</label>
                    <input type="number" value={{ round($builtuparea / 10.764, 6) }} class="form-control" disabled
                        readonly>
                </div>
            @endif
            <div class="col-md-6">
                <label for="plinthareaofflatid" class="form-label">WHAT IS THE PLINTH AREA OF THE FLAT?</label>
                @if (true)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model='plinthareaofflat' type="number" class="form-control" id="plinthareaofflatid">
                @error('plinthareaofflat')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            @if ($plinthareaofflat)
                <div class="col-md-6">
                    <label class="form-label">THE PLINTH AREA OF THE FLAT(in Sqm)</label>
                    <input type="number" value={{ round($plinthareaofflat / 10.764, 6) }} class="form-control"
                        disabled readonly>
                </div>
            @endif
            <div class="col-md-6">
                <label for="carpetareaofflatid" class="form-label">WHAT IS THE CARPET AREA OF THE FLAT?(in Sqft)</label>
                @if (false)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model="carpetareaofflat" type="number" class="form-control" id="carpetareaofflatid">
                @error('carpetareaofflat')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            @if ($carpetareaofflat)
                <div class="col-md-6">
                    <label class="form-label">THE CARPET AREA OF THE FLAT(in Sqm)</label>
                    <input type="number" value={{ round($carpetareaofflat / 10.764, 6) }} class="form-control"
                        disabled readonly>
                </div>
            @endif
            <div class="col-md-6">
                <label for="floorspaceindexid" class="form-label">WHAT IS THE FLOOR SPACE INDEX (APP.)</label>
                @if (false)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input type="number" class="form-control" id="floorspaceindexid">
                @error('floorspaceindex')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            @include('helper.formhelper.form', [
                'type' => 'select',
                'default_option' => 'Select  an option',
                'fieldname' => 'areaoflocality',
                'labelname' => 'Is it Posh/ I class / Medium / Ordinary?',
                'labelidname' => 'areaoflocalityid',
                'option' => config('archive.areaoflocality'),
                'required' => false,
                'col' => 'col-md-6',
            ])
            @include('helper.formhelper.form', [
                'type' => 'select',
                'default_option' => 'Select  an option',
                'fieldname' => 'usagepurpose',
                'labelname' => 'Is it being used for Residential or Commercial purpose? ',
                'labelidname' => 'usagepurposeid',
                'option' => config('archive.usagepurpose'),
                'required' => false,
                'col' => 'col-md-6',
            ])
            @include('helper.formhelper.form', [
                'type' => 'select',
                'default_option' => 'Select  an option',
                'fieldname' => 'owneroccupiedorletout',
                'labelname' => 'IS IT OWNER-OCCUPIED OR LET OUT?:',
                'labelidname' => 'owneroccupiedorletoutid',
                'option' => config('archive.owneroccupiedorletout'),
                'required' => false,
                'col' => 'col-md-6',
            ])
            <div class="col-md-6">
                <label for="monthlyrentid" class="form-label">IF RENTED, WHAT IS THE MONTHLY RENT?:</label>
                @if (false)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input type="number" wire:model='monthlyrent' class="form-control" id="monthlyrentid">
                @error('monthlyrent')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <h5 class="card-header theme_bg_color text-white">Annexure – Technical Details</h5>
            <h5 class="card-header theme_bg_color text-white">Setbacks</h5>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-2">
                        Direction
                    </div>
                    <div class="col-md-4 mb-2">
                        As per Plan in ft
                    </div>
                    <div class="col-md-4 mb-2">
                        As per Site in ft
                    </div>
                    <div class="col-md-4 mb-2">
                        North
                    </div>
                    <div class="col-md-4 mb-2">
                        @if (false)
                            <span class="text-danger fw-bold">*</span>
                        @endif
                        <input wire:model='setbacksasperplannorth' type="number" class="form-control"
                            id="setbacksasperplannorthid">
                        @error('setbacksasperplannorth')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        @if (false)
                            <span class="text-danger fw-bold">*</span>
                        @endif
                        <input wire:model='setbacksaspersitenorth' type="number" class="form-control"
                            id="setbacksaspersitenorthid">
                        @error('setbacksaspersitenorth')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        South
                    </div>
                    <div class="col-md-4 mb-2">
                        @if (false)
                            <span class="text-danger fw-bold">*</span>
                        @endif
                        <input wire:model='setbacksasperplansouth' type="number" class="form-control"
                            id="setbacksasperplansouthid">
                        @error('setbacksasperplansouth')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        @if (false)
                            <span class="text-danger fw-bold">*</span>
                        @endif
                        <input wire:model='setbacksaspersitesouth' type="number" class="form-control"
                            id="setbacksaspersitesouthid">
                        @error('setbacksaspersitesouth')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        East
                    </div>
                    <div class="col-md-4 mb-2">
                        @if (false)
                            <span class="text-danger fw-bold">*</span>
                        @endif
                        <input wire:model='setbacksasperplaneast' type="number" class="form-control"
                            id="setbacksasperplaneastid">
                        @error('setbacksasperplaneast')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        @if (false)
                            <span class="text-danger fw-bold">*</span>
                        @endif
                        <input wire:model='setbacksaspersiteeast' type="number" class="form-control"
                            id="setbacksaspersiteeastid">
                        @error('setbacksaspersiteeast')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        West
                    </div>
                    <div class="col-md-4 mb-2">
                        @if (false)
                            <span class="text-danger fw-bold">*</span>
                        @endif
                        <input wire:model='setbacksasperplanwest' type="number" class="form-control"
                            id="setbacksasperplanwestid">
                        @error('setbacksasperplanwest')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        @if (false)
                            <span class="text-danger fw-bold">*</span>
                        @endif
                        <input wire:model='setbacksaspersitewest' type="number" class="form-control"
                            id="setbacksaspersitewestid">
                        @error('setbacksaspersitewest')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <h5 class="card-header theme_bg_color text-white">Plinth area</h5>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered text-center p-0 m-0 w-100">
                        <thead class="text-white theme_bg_color">
                            <tr>
                                <th scope="col">Description</th>
                                <th scope="col">As per plan</th>
                                <th scope="col">As per site</th>
                                <th class="text-center" style="width: 8%;">
                                    <button wire:click="addplintharea()" type="button"
                                        class="btn btn-sm btn-success  shadow">Add <i
                                            class="bi bi-plus-circle"></i></button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($plintharealist as $key => $eachplintharealist)
                                <tr>
                                    <td>
                                        <input wire:model.lazy="plintharealist.{{ $key }}.name"
                                            type="text" class="form-control">
                                        @error('plintharealist.' . $key . '.name')
                                            <span class="text-danger error">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input wire:model.lazy="plintharealist.{{ $key }}.asperplan"
                                            type="number" class="form-control">
                                        @error('plintharealist.' . $key . '.asperplan')
                                            <span class="text-danger error">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input wire:model.lazy="plintharealist.{{ $key }}.aspersite"
                                            type="number" class="form-control">
                                        @error('plintharealist.' . $key . '.aspersite')
                                            <span class="text-danger error">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td class="text-center">

                                        @if ($plinthareabutton == 0)
                                            <button wire:click.prevent="removeplintharea({{ $key }})"
                                                class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i>
                                            </button>
                                        @elseif($key + 1 > $plinthareabutton)
                                            <button wire:click.prevent="removeplintharea({{ $key }})"
                                                class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i>
                                            </button>
                                        @else
                                            -
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <h5 class="card-header theme_bg_color text-white">Dwelling units</h5>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered text-center p-0 m-0 w-100">
                        <thead class="text-white theme_bg_color">
                            <tr>
                                <th scope="col">Description</th>
                                <th scope="col">As per plan</th>
                                <th scope="col">As per site</th>
                                <th class="text-center" style="width: 8%;">
                                    <button wire:click="adddwellingarea()" type="button"
                                        class="btn btn-sm btn-success  shadow">Add <i
                                            class="bi bi-plus-circle"></i></button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dwellingarealist as $key => $eachdwellingarealist)
                                <tr>
                                    <td>
                                        <input wire:model.lazy="dwellingarealist.{{ $key }}.name"
                                            type="text" class="form-control">
                                        @error('dwellingarealist.' . $key . '.name')
                                            <span class="text-danger error">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input wire:model.lazy="dwellingarealist.{{ $key }}.asperplan"
                                            type="number" class="form-control">
                                        @error('dwellingarealist.' . $key . '.asperplan')
                                            <span class="text-danger error">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input wire:model.lazy="dwellingarealist.{{ $key }}.aspersite"
                                            type="number" class="form-control">
                                        @error('dwellingarealist.' . $key . '.aspersite')
                                            <span class="text-danger error">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td class="text-center">

                                        @if ($dwellingareabutton == 0)
                                            <button wire:click.prevent="removedwellingarea({{ $key }})"
                                                class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i>
                                            </button>
                                        @elseif($key + 1 > $dwellingareabutton)
                                            <button wire:click.prevent="removedwellingarea({{ $key }})"
                                                class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i>
                                            </button>
                                        @else
                                            -
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="float-end d-flex gap-1">
            <button class="btn  btn-sm btn-secondary text-white float-end mt-3" type="button"
                wire:click="back(2)">back</button>
            <button class="btn btn-sm theme_bg_color text-white float-end mt-3" type="button"
                wire:click="thirdStepSubmit">Next</button>
        </div>
    </div>
    <script>
        function scrolltop() {
            const top = document.getElementById('step3');
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
