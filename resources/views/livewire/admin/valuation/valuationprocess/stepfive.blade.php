<div class="card mt-3 shadow-sm  setup-content {{ $currentStep != 5 ? 'display-none' : '' }}" id="step5">
    <h5 class="card-header theme_bg_color text-white">DETAILS OF VALUATION (TYPE QTY AND RATE TO CALCULATE ESTIMATED
        RATE)</h5>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered text-center p-0 m-0 w-100">
                        <thead class="text-white theme_bg_color">
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Description</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Rate/unit</th>
                                <th scope="col">Estimated Value</th>
                                <th scope="col">Guide line Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    1.
                                </td>
                                <td>
                                    Present Total value of the flat (incl. Car Parking), As on date
                                </td>
                                <td>
                                    <input type="number" value="{{ $builtuparea }}" class="form-control"
                                        id="buildingplusserviceqtyid" readonly>
                                </td>
                                <td>
                                    <input type="number" value="{{ $say }}" class="form-control"
                                        id="buildingplusservicerateid" readonly>
                                </td>
                                <td>
                                    <input type="number" value="{{ $builtuparea * $say }}" class="form-control"
                                        id="estimatebuildingplusservicerateid" readonly>
                                </td>
                                <td>
                                    <input type="number" value="{{ $extentofsite * $registrarrate }}"
                                        class="form-control" id="buildingplusserviceguideid" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    2.
                                </td>
                                <td>
                                    BUILDING PLUS SERVICES:
                                </td>
                                <td>
                                    <div>
                                        <input wire:model='buildingplusserviceqty' type="number" class="form-control"
                                            id="buildingplusserviceqtyid">
                                        @error('buildingplusserviceqty')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input wire:model='buildingplusservicerate' type="number" class="form-control"
                                            id="buildingplusservicerateid">
                                        @error('buildingplusservicerate')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    @if ($buildingplusserviceqty && $buildingplusservicerate)
                                        <div>
                                            <input type="number"
                                                value="{{ $buildingplusserviceqty * $buildingplusservicerate }}"
                                                class="form-control" id="estimatebuildingplusservicerateid" readonly>
                                        </div>
                                    @else
                                        <div>
                                            <input type="number" class="form-control"
                                                id="estimatebuildingplusservicerateid" readonly>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div>
                                        <input type="number"
                                            value="{{ $plinthareaofflat * $pwddepreciatedrateconstruction }}"
                                            class="form-control" id="buildingplusserviceguideid" readonly>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    3.
                                </td>
                                <td>
                                    COVERED CAR PARKING :
                                </td>
                                <td>
                                    <div>
                                        <input wire:model='coveredcarparkqty' type="number" class="form-control"
                                            id="coveredcarparkqtyid">
                                        @error('coveredcarparkqty')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input wire:model='coveredcarparkrate' type="number" class="form-control"
                                            id="coveredcarparkrateid">
                                        @error('coveredcarparkrate')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    @if ($coveredcarparkqty && $coveredcarparkrate)
                                        <div>
                                            <input type="number"
                                                value="{{ $coveredcarparkqty * $coveredcarparkrate }}"
                                                class="form-control" id="estimatecoveredcarparkrateid" readonly>
                                        </div>
                                    @else
                                        <div>
                                            <input type="number" class="form-control" id="estimatecoveredcarparkrateid"
                                                readonly>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div>
                                        <input wire:model='coveredcarparkguide' type="number" class="form-control"
                                            id="coveredcarparkguideid">
                                        @error('coveredcarparkguide')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    4.
                                </td>
                                <td>
                                    LIFT :
                                </td>
                                <td>
                                    <div>
                                        <input wire:model='liftqty' type="number" class="form-control" id="liftqtyid">
                                        @error('liftqty')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input wire:model='liftrate' type="number" class="form-control"
                                            id="liftrateid">
                                        @error('liftrate')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    @if ($liftqty && $liftrate)
                                        <div>
                                            <input type="number" value="{{ $liftqty * $liftrate }}"
                                                class="form-control" id="estimateliftrateid" readonly>
                                        </div>
                                    @else
                                        <div>
                                            <input type="number" class="form-control" id="estimateliftrateid" readonly>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div>
                                        <input wire:model='liftguide' type="number" class="form-control"
                                            id="liftguideid">
                                        @error('liftguide')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    5.
                                </td>
                                <td>
                                    MODULAR KITCHEN ARRANGEMENTS :
                                </td>
                                <td>
                                    <div>
                                        <input wire:model='modularkitchenqty' type="number" class="form-control"
                                            id="modularkitchenqtyid">
                                        @error('modularkitchenqty')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input wire:model='modularkitchenrate' type="number" class="form-control"
                                            id="modularkitchenrateid">
                                        @error('modularkitchenrate')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    @if ($modularkitchenqty && $modularkitchenrate)
                                        <div>
                                            <input type="number"
                                                value="{{ $modularkitchenqty * $modularkitchenrate }}"
                                                class="form-control" id="estimatemodularkitchenrateid" readonly>
                                        </div>
                                    @else
                                        <div>
                                            <input type="number" class="form-control"
                                                id="estimatemodularkitchenrateid" readonly>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div>
                                        <input wire:model='modularkitchenguide' type="number" class="form-control"
                                            id="modularkitchenguideid">
                                        @error('modularkitchenguide')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    6.
                                </td>
                                <td>
                                    SUPERFINE FINISH :
                                </td>
                                <td>
                                    <div>
                                        <input wire:model='superfinefinishqty' type="number" class="form-control"
                                            id="superfinefinishqtyid">
                                        @error('superfinefinishqty')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input wire:model='superfinefinishrate' type="number" class="form-control"
                                            id="superfinefinishrateid">
                                        @error('superfinefinishrate')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    @if ($superfinefinishqty && $superfinefinishrate)
                                        <div>
                                            <input type="number"
                                                value="{{ $superfinefinishqty * $superfinefinishrate }}"
                                                class="form-control" id="estimatesuperfinefinishrateid" readonly>
                                        </div>
                                    @else
                                        <div>
                                            <input type="number" class="form-control"
                                                id="estimatesuperfinefinishrateid" readonly>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div>
                                        <input wire:model='superfinefinishguide' type="number" class="form-control"
                                            id="superfinefinishguideid">
                                        @error('superfinefinishguide')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    7.
                                </td>
                                <td>
                                    INTERIOR DECORATIONS :
                                </td>
                                <td>
                                    <div>
                                        <input wire:model='interiordecorationqty' type="number" class="form-control"
                                            id="interiordecorationqtyid">
                                        @error('interiordecorationqty')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input wire:model='interiordecorationrate' type="number"
                                            class="form-control" id="interiordecorationrateid">
                                        @error('interiordecorationrate')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    @if ($interiordecorationqty && $interiordecorationrate)
                                        <div>
                                            <input type="number"
                                                value="{{ $interiordecorationqty * $interiordecorationrate }}"
                                                class="form-control" id="estimateinteriordecorationrateid" readonly>
                                        </div>
                                    @else
                                        <div>
                                            <input type="number" class="form-control"
                                                id="estimateinteriordecorationrateid" readonly>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div>
                                        <input wire:model='interiordecorationguide' type="number"
                                            class="form-control" id="interiordecorationguideid">
                                        @error('interiordecorationguide')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    8.
                                </td>
                                <td>
                                    ELECTRICITY DEPOSITS / ELECTRICAL FITTINGS, ETC. :
                                </td>
                                <td>
                                    <div>
                                        <input wire:model='electricaldepositfittingqty' type="number"
                                            class="form-control" id="electricaldepositfittingqtyid">
                                        @error('electricaldepositfittingqty')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input wire:model='electricaldepositfittingrate' type="number"
                                            class="form-control" id="electricaldepositfittingrateid">
                                        @error('electricaldepositfittingrate')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    @if ($electricaldepositfittingqty && $electricaldepositfittingrate)
                                        <div>
                                            <input type="number"
                                                value="{{ $electricaldepositfittingqty * $electricaldepositfittingrate }}"
                                                class="form-control" id="estimateelectricaldepositfittingrateid"
                                                readonly>
                                        </div>
                                    @else
                                        <div>
                                            <input type="number" class="form-control"
                                                id="estimateelectricaldepositfittingrateid" readonly>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div>
                                        <input wire:model='electricaldepositfittingguide' type="number"
                                            class="form-control" id="electricaldepositfittingguideid">
                                        @error('electricaldepositfittingguide')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    9.
                                </td>
                                <td>
                                    EXTRA COLLAPSIBLE GATES / GRILL WORKS ETC. :
                                </td>
                                <td>
                                    <div>
                                        <input wire:model='extracollapsiblegateqty' type="number"
                                            class="form-control" id="extracollapsiblegateqtyid">
                                        @error('extracollapsiblegateqty')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input wire:model='extracollapsiblegaterate' type="number"
                                            class="form-control" id="extracollapsiblegaterateid">
                                        @error('extracollapsiblegaterate')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    @if ($extracollapsiblegateqty && $extracollapsiblegaterate)
                                        <div>
                                            <input type="number"
                                                value="{{ $extracollapsiblegateqty * $extracollapsiblegaterate }}"
                                                class="form-control" id="estimateextracollapsiblegaterateid" readonly>
                                        </div>
                                    @else
                                        <div>
                                            <input type="number" class="form-control"
                                                id="estimateextracollapsiblegaterateid" readonly>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div>
                                        <input wire:model='extracollapsiblegateguide' type="number"
                                            class="form-control" id="extracollapsiblegateguideid">
                                        @error('extracollapsiblegateguide')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    10.
                                </td>
                                <td>
                                    POTENTIAL VALUE, IF ANY :
                                </td>
                                <td>
                                    <div>
                                        <input wire:model='potentialvalueqty' type="number" class="form-control"
                                            id="potentialvalueqtyid">
                                        @error('potentialvalueqty')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input wire:model='potentialvaluerate' type="number" class="form-control"
                                            id="potentialvaluerateid">
                                        @error('potentialvaluerate')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    @if ($potentialvalueqty && $potentialvaluerate)
                                        <div>
                                            <input type="number"
                                                value="{{ $potentialvalueqty * $potentialvaluerate }}"
                                                class="form-control" id="estimatepotentialvaluerateid" readonly>
                                        </div>
                                    @else
                                        <div>
                                            <input type="number" class="form-control"
                                                id="estimatepotentialvaluerateid" readonly>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div>
                                        <input wire:model='potentialvalueguide' type="number" class="form-control"
                                            id="potentialvalueguideid">
                                        @error('potentialvalueguide')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    TOTAL
                                </td>
                                @php
                                    $estimatetotal = $say * $builtuparea;
                                    $guidelinetotal = $registrarrate * $extentofsite + $plinthareaofflat * $pwddepreciatedrateconstruction + $coveredcarparkguide + $liftguide + $modularkitchenguide + $superfinefinishguide + $interiordecorationguide + $electricaldepositfittingguide + $extracollapsiblegateguide + $potentialvalueguide;
                                    if ($buildingplusserviceqty && $buildingplusservicerate) {
                                        $estimatetotal += $buildingplusserviceqty * $buildingplusservicerate;
                                    }
                                    if ($coveredcarparkqty && $coveredcarparkrate) {
                                        $estimatetotal += $coveredcarparkqty * $coveredcarparkrate;
                                    }
                                    if ($liftqty && $liftrate) {
                                        $estimatetotal += $liftqty * $liftrate;
                                    }
                                    if ($modularkitchenqty && $modularkitchenrate) {
                                        $estimatetotal += $modularkitchenqty * $modularkitchenrate;
                                    }
                                    if ($superfinefinishqty && $superfinefinishrate) {
                                        $estimatetotal += $superfinefinishqty * $superfinefinishrate;
                                    }
                                    if ($interiordecorationqty && $interiordecorationrate) {
                                        $estimatetotal += $interiordecorationqty * $interiordecorationrate;
                                    }
                                    if ($electricaldepositfittingqty && $electricaldepositfittingrate) {
                                        $estimatetotal += $electricaldepositfittingqty * $electricaldepositfittingrate;
                                    }
                                    if ($extracollapsiblegateqty && $extracollapsiblegaterate) {
                                        $estimatetotal += $extracollapsiblegateqty * $extracollapsiblegaterate;
                                    }
                                    if ($potentialvalueqty && $potentialvaluerate) {
                                        $estimatetotal += $potentialvalueqty * $potentialvaluerate;
                                    }
                                @endphp
                                <td>
                                    <input value="{{ $estimatetotal }}" type="number" class="form-control"
                                        readonly>
                                </td>
                                <td>
                                    <div>
                                        <input value="{{ $guidelinetotal }}" type="number" class="form-control"
                                            readonly>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label class="form-label">Book value of immovable property(Rs.):</label>
                        <input value={{ $estimatetotal }} type="number" class="form-control" readonly>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label">Distress Sale Value of immovable property(Rs.):</label>
                        <input value="{{ 0.9 * $estimatetotal }}" type="number" class="form-control" readonly>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label">Realizable Value of immovable property(Rs.):</label>
                        <input value="{{ 0.8 * $estimatetotal }}" type="number" class="form-control" readonly>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label">Guideline Value (value as per Circle Rates)(Rs.):</label>
                        <input value="{{ $guidelinetotal }}" type="number" class="form-control" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="float-end d-flex gap-1">
            <button class="btn  btn-sm btn-secondary text-white float-end mt-3" type="button"
                wire:click="back(4)">back</button>
            <button class="btn btn-sm theme_bg_color text-white float-end mt-3" type="button"
                wire:click="fifthStepSubmit">Next</button>
        </div>
    </div>
    <script>
        function scrolltop() {
            const top = document.getElementById('step5');
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
