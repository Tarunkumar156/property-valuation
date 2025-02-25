<div class="card mt-3 shadow-sm  setup-content {{ $currentStep != 1 ? 'hidden' : '' }}" id="step1">
    <h5 class="card-header theme_bg_color text-white">General</h5>

    <div class="card-body">
        <div class="row g-3">
            @include('helper.formhelper.form', [
                'type' => 'text',
                'fieldname' => 'fileno',
                'labelname' => 'FILE NO:',
                'labelidname' => 'filenoid',
                'required' => true,
                'col' => 'col-md-6',
            ])
            <div class="col-md-6">
                <label for="filedateid" class="form-label">FILE DATE:</label>
                @if (true)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model="filedate" type="date" class="form-control" id="filedateid">
                @error('filedate')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{-- @include('helper.formhelper.form', [
                'type' => 'select',
                'default_option' => 'Select  an valuer',
                'fieldname' => 'engineer_id',
                'labelname' => 'ENGINEER',
                'labelidname' => 'engineer_id',
                'option' => $engineerlist,
                'required' => true,
                'col' => 'col-md-6',
            ]) --}}
            <div class="col-md-6">
                <label for="valuerid" class="form-label">NAME OF THE VALUER:</label>
                @if (true)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <select wire:model="engineer_id" class="form-select" id="valuerid">
                    <option value>Select a valuer</option>
                    @foreach ($engineerlist as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
                @error($engineer_id)
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{-- @include('helper.formhelper.form', [
                'type' => 'text',
                'fieldname' => 'nameofvaluer',
                'labelname' => 'NAME OF THE VALUER:',
                'labelidname' => 'nameofvaluerid',
                'required' => true,
                'col' => 'col-md-6',
            ]) --}}
            @if ($valueraddress)
                <div class="col-md-6">
                    <label for="addressofvaluerid" class="form-label">ADDRESS OF THE VALUER:</label>
                    <textarea wire:model='valueraddress' class="form-control" id="addressofvaluerid" rows="2"></textarea>
                </div>
            @endif
            {{-- @include('helper.formhelper.form', [
                'type' => 'textarea',
                'fieldname' => 'addressofvaluer',
                'labelname' => 'ADDRESS OF THE VALUER:',
                'labelidname' => 'addressofvaluerid',
                'required' => true,
                'col' => 'col-md-6',
            ]) --}}
            @include('helper.formhelper.form', [
                'type' => 'text',
                'fieldname' => 'purposeofvaluation',
                'labelname' => 'PURPOSE FOR WHICH THE VALUATION IS MADE:',
                'labelidname' => 'purposeofvaluationid',
                'required' => false,
                'col' => 'col-md-12',
            ])
            <div class="col-md-4">
                <label for="dateofinspectionid" class="form-label">DATE OF INSPECTION:</label>
                @if (true)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model="dateofinspection" type="date" class="form-control" id="dateofinspectionid">
                @error('dateofinspection')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            @include('helper.formhelper.form', [
                'type' => 'text',
                'fieldname' => 'titledeednumberdate',
                'labelname' => 'TITLE DEED NUMBER AND DATE:',
                'labelidname' => 'titledeednumberdateid',
                'required' => false,
                'col' => 'col-md-4',
            ])
            <div class="col-md-4">
                <label for="dateonvaluationid" class="form-label">DATE ON WHICH THE VALUATION IS MADE:</label>
                @if (false)
                    <span class="text-danger fw-bold">*</span>
                @endif
                <input wire:model="dateonvaluation" type="date" class="form-control" id="dateonvaluationid">
                @error('dateonvaluation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <h5 class="card-header theme_bg_color text-white">List of documents produced for perusal</h5>

            @include('helper.formhelper.form', [
                'type' => 'text',
                'fieldname' => 'document1',
                'labelname' => 'DOCUMENT 1:',
                'labelidname' => 'document1id',
                'required' => false,
                'col' => 'col-md-6',
            ])
            @include('helper.formhelper.form', [
                'type' => 'text',
                'fieldname' => 'document2',
                'labelname' => 'DOCUMENT 2:',
                'labelidname' => 'document2id',
                'required' => false,
                'col' => 'col-md-6',
            ])
            @include('helper.formhelper.form', [
                'type' => 'text',
                'fieldname' => 'document3',
                'labelname' => 'DOCUMENT 3:',
                'labelidname' => 'document3id',
                'required' => false,
                'col' => 'col-md-6',
            ])
            @include('helper.formhelper.form', [
                'type' => 'text',
                'fieldname' => 'document4',
                'labelname' => 'DOCUMENT 4:',
                'labelidname' => 'document4id',
                'required' => false,
                'col' => 'col-md-6',
            ])
            <h5 class="card-header theme_bg_color text-white">Name of the owner(s) and his / their address (es) with
                Phone no.</h5>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered text-center p-0 m-0 w-100">
                        <thead class="text-white theme_bg_color">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">S/D/W Of</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone No</th>
                                <th class="text-center" style="width: 8%;">
                                    <button wire:click="addowner()" type="button"
                                        class="btn btn-sm btn-success  shadow">Add <i
                                            class="bi bi-plus-circle"></i></button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($owner_list as $key => $eachowners_list)
                                <tr>
                                    <td>
                                        <input wire:model.lazy="owner_list.{{ $key }}.name" type="text"
                                            class="form-control">
                                        @error('owner_list.' . $key . '.name')
                                            <span class="text-danger error">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input wire:model.lazy="owner_list.{{ $key }}.sdof" type="text"
                                            class="form-control">
                                        @error('owner_list.' . $key . '.sdof')
                                            <span class="text-danger error">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td>
                                        <textarea wire:model.lazy="owner_list.{{ $key }}.address" class="form-control" rows="2"></textarea>
                                        @error('owner_list.' . $key . '.address')
                                            <span class="text-danger error">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input wire:model.lazy="owner_list.{{ $key }}.phone" type="number"
                                            class="form-control">
                                        @error('owner_list.' . $key . '.phone')
                                            <span class="text-danger error">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td class="text-center">

                                        @if ($ownerdeletebutton == 0)
                                            <button wire:click.prevent="removeowner({{ $key }})"
                                                class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i> </button>
                                        @elseif($key + 1 > $ownerdeletebutton)
                                            <button wire:click.prevent="removeowner({{ $key }})"
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
            @include('helper.formhelper.form', [
                'type' => 'select',
                'default_option' => 'Select  an option',
                'fieldname' => 'propertydesccription',
                'labelname' => 'BRIEF DESCRIPTION OF THE PROPERTY',
                'labelidname' => 'propertydesccriptionid',
                'option' => config('archive.propertydesccription'),
                'required' => false,
                'col' => 'col-md-6',
            ])
            <h5 class="card-header theme_bg_color text-white"> LOCATION PROPERTY</h5>
            <div class="row g-3">
                @include('helper.formhelper.form', [
                    'type' => 'text',
                    'fieldname' => 'plotorsurveyno',
                    'labelname' => 'PLOT NO/ SURVEY NO',
                    'labelidname' => 'plotorsurveynoid',
                    'required' => false,
                    'col' => 'col-md-4',
                ])
                @include('helper.formhelper.form', [
                    'type' => 'text',
                    'fieldname' => 'doorno',
                    'labelname' => 'DOOR NO',
                    'labelidname' => 'doornoid',
                    'required' => false,
                    'col' => 'col-md-4',
                ])
                @include('helper.formhelper.form', [
                    'type' => 'text',
                    'fieldname' => 'tsnoorvillage',
                    'labelname' => 'T.S. NO/ VILLAGE',
                    'labelidname' => 'tsnoorvillageid',
                    'required' => false,
                    'col' => 'col-md-4',
                ])
                @include('helper.formhelper.form', [
                    'type' => 'text',
                    'fieldname' => 'wardortaluka',
                    'labelname' => 'WARD / TALUKA',
                    'labelidname' => 'wardortalukaid',
                    'required' => false,
                    'col' => 'col-md-4',
                ])
                @include('helper.formhelper.form', [
                    'type' => 'text',
                    'fieldname' => 'mandalordistrict',
                    'labelname' => 'MANDAL/ DISTRICT',
                    'labelidname' => 'mandalordistrictid',
                    'required' => false,
                    'col' => 'col-md-4',
                ])
                @include('helper.formhelper.form', [
                    'type' => 'text',
                    'fieldname' => 'validityoflayout',
                    'labelname' => 'VALIDITY OF LAYOUT OF APPROVED MAP / PLAN',
                    'labelidname' => 'validityoflayoutid',
                    'required' => false,
                    'col' => 'col-md-8',
                ])
                <div class="col-md-4">
                    <label for="dateofissueid" class="form-label">DATE OF ISSUE:</label>
                    @if (false)
                        <span class="text-danger fw-bold">*</span>
                    @endif
                    <input wire:model="dateofissue" type="date" class="form-control" id="dateofissueid">
                    @error('dateofissue')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                @include('helper.formhelper.form', [
                    'type' => 'text',
                    'fieldname' => 'approvedmaporplanissuingauthority',
                    'labelname' => 'APPROVED MAP / PLAN ISSUING AUTHORITY',
                    'labelidname' => 'approvedmaporplanissuingauthorityid',
                    'required' => false,
                    'col' => 'col-md-8',
                ])
                <div class="col-md-4">
                    <label for="approvedmapdateid" class="form-label">DATE:</label>
                    @if (false)
                        <span class="text-danger fw-bold">*</span>
                    @endif
                    <input wire:model="approvedmapdate" type="date" class="form-control" id="approvedmapdateid">
                    @error('approvedmapdate')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <h5 class="card-header theme_bg_color text-white">Whether genuineness or authenticity of approved map /
                    plan is verified
                </h5>
                <div class="col-md-12 mb-3 d-flex gap-4 justify-content-center">
                    <div class="text-danger fw-bold">No</div>
                    <div>
                        @if (false)
                            <span class="text-danger fw-bold">*</span>
                        @endif
                        <div class="form-check form-switch">
                            <input wire:model="plan_is_verified" class="form-check-input" id="plan_is_verified"
                                type="checkbox" role="switch" id="flexSwitchCheckDefault" />
                        </div>
                    </div>
                    <div>
                        <span class="text-success fw-bold">YES</span>
                    </div>
                    @error('plan_is_verified')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <h5 class="card-header theme_bg_color text-white">Any other comments on authentic of approved plan</h5>
                @include('helper.formhelper.form', [
                    'type' => 'textarea',
                    'fieldname' => 'othercomments',
                    'labelname' => '',
                    'labelidname' => 'othercommentsid',
                    'required' => false,
                    'col' => 'col-md-12',
                ])
                <h5 class="card-header theme_bg_color text-white">Postal address of the property</h5>
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center p-0 m-0 w-100">
                            <thead class="text-white theme_bg_color">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">S/D/W Of</th>
                                    <th class="text-center" style="width: 15%;">
                                        <button wire:click="addpropertyowner()" type="button"
                                            class="btn btn-sm btn-success  shadow">Add <i
                                                class="bi bi-plus-circle"></i></button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($propertyownerlist as $key => $eachpropertyownerlist)
                                    <tr>
                                        <td>
                                            <input wire:model.lazy="propertyownerlist.{{ $key }}.name"
                                                type="text" class="form-control">
                                            @error('propertyownerlist.' . $key . '.name')
                                                <span class="text-danger error">{{ $message }}</span>
                                            @enderror
                                        </td>
                                        <td>
                                            <input wire:model.lazy="propertyownerlist.{{ $key }}.sdof"
                                                type="text" class="form-control">
                                            @error('propertyownerlist.' . $key . '.sdof')
                                                <span class="text-danger error">{{ $message }}</span>
                                            @enderror
                                        </td>
                                        <td class="text-center">

                                            @if ($propertyownerdeletebutton == 0)
                                                <button wire:click.prevent="removepropertyowner({{ $key }})"
                                                    class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i>
                                                </button>
                                            @elseif($key + 1 > $propertyownerdeletebutton)
                                                <button wire:click.prevent="removepropertyowner({{ $key }})"
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
                @include('helper.formhelper.form', [
                    'type' => 'textarea',
                    'fieldname' => 'addressofproperty',
                    'labelname' => 'ADDRESS',
                    'labelidname' => 'addressofpropertyid',
                    'required' => true,
                    'col' => 'col-md-12',
                ])
                @include('helper.formhelper.form', [
                    'type' => 'text',
                    'fieldname' => 'cityortown',
                    'labelname' => 'CITY / TOWN',
                    'labelidname' => 'cityortownid',
                    'required' => false,
                    'col' => 'col-md-6',
                ])
                @include('helper.formhelper.form', [
                    'type' => 'text',
                    'fieldname' => 'residentialarea',
                    'labelname' => 'RESIDENTIAL AREA',
                    'labelidname' => 'residentialareaid',
                    'required' => false,
                    'col' => 'col-md-6',
                ])
                @include('helper.formhelper.form', [
                    'type' => 'text',
                    'fieldname' => 'commercialarea',
                    'labelname' => 'COMMERCIAL AREA',
                    'labelidname' => 'commercialareaid',
                    'required' => false,
                    'col' => 'col-md-6',
                ])
                @include('helper.formhelper.form', [
                    'type' => 'text',
                    'fieldname' => 'industrialarea',
                    'labelname' => 'INDUSTRIAL AREA',
                    'labelidname' => 'industrialareaid',
                    'required' => false,
                    'col' => 'col-md-6',
                ])
                <h5 class="card-header theme_bg_color text-white">Classification of the area</h5>
                @include('helper.formhelper.form', [
                    'type' => 'select',
                    'default_option' => 'Select  an option',
                    'fieldname' => 'classificationofarea',
                    'labelname' => 'HIGH / MIDDLE / POOR',
                    'labelidname' => 'classificationofareaid',
                    'option' => config('archive.classification1'),
                    'required' => false,
                    'col' => 'col-md-4',
                ])
                @include('helper.formhelper.form', [
                    'type' => 'select',
                    'default_option' => 'Select  an option',
                    'fieldname' => 'classificationofarea1',
                    'labelname' => 'URBAN / SEMI URBAN / RURAL',
                    'labelidname' => 'classificationofarea1id',
                    'option' => config('archive.classification2'),
                    'required' => false,
                    'col' => 'col-md-4',
                ])
                @include('helper.formhelper.form', [
                    'type' => 'select',
                    'default_option' => 'Select  an option',
                    'fieldname' => 'propertycomesunder',
                    'labelname' => 'PROPERTY COMES UNDER:',
                    'labelidname' => 'propertycomesunderid',
                    'option' => config('archive.propertycomesunder'),
                    'required' => false,
                    'col' => 'col-md-4',
                ])
                <h5 class="card-header theme_bg_color text-white">WHETHER COVERED UNDER ANY STATE/CENTRAL GOVT.
                    ENACTMENTS OR NOTIFIED UNDER AGENCY AREA/SCHEDULED AREA/CANTONMENT AREA</h5>
                @include('helper.formhelper.form', [
                    'type' => 'text',
                    'fieldname' => 'coveredunder',
                    'labelname' => '',
                    'labelidname' => 'coveredunderid',
                    'required' => false,
                    'col' => 'col-md-12',
                ])
                <h5 class="card-header theme_bg_color text-white">BOUNDARIES OF THE PROPERTY</h5>
                @include('helper.formhelper.form', [
                    'type' => 'text',
                    'fieldname' => 'boundaryofpropertynorth',
                    'labelname' => 'NORTH:',
                    'labelidname' => 'boundaryofpropertynorthid',
                    'required' => false,
                    'col' => 'col-md-6',
                ])
                @include('helper.formhelper.form', [
                    'type' => 'text',
                    'fieldname' => 'boundaryofpropertysouth',
                    'labelname' => 'SOUTH:',
                    'labelidname' => 'boundaryofpropertysouthid',
                    'required' => false,
                    'col' => 'col-md-6',
                ])
                @include('helper.formhelper.form', [
                    'type' => 'text',
                    'fieldname' => 'boundaryofpropertyeast',
                    'labelname' => 'EAST:',
                    'labelidname' => 'boundaryofpropertyeastid',
                    'required' => false,
                    'col' => 'col-md-6',
                ])
                @include('helper.formhelper.form', [
                    'type' => 'text',
                    'fieldname' => 'boundaryofpropertywest',
                    'labelname' => 'WEST:',
                    'labelidname' => 'boundaryofpropertywestid',
                    'required' => false,
                    'col' => 'col-md-6',
                ])
                <h5 class="card-header theme_bg_color text-white">DIMENSIONS OF THE SITE / FLAT (in Sqft)</h5>
                <h5 class="card-header theme_bg_color text-white">NORTH</h5>
                @include('helper.formhelper.form', [
                    'type' => 'text',
                    'fieldname' => 'dimensionofsiteasperdeednorth',
                    'labelname' => 'AS PER DEED :',
                    'labelidname' => 'dimensionofsiteasperdeednorthid',
                    'required' => false,
                    'col' => 'col-md-6',
                ])
                @include('helper.formhelper.form', [
                    'type' => 'text',
                    'fieldname' => 'dimensionofsiteasexistingnorth',
                    'labelname' => 'AS EXISTING :',
                    'labelidname' => 'dimensionofsiteasexistingnorthid',
                    'required' => false,
                    'col' => 'col-md-6',
                ])
                <h5 class="card-header theme_bg_color text-white">SOUTH</h5>
                @include('helper.formhelper.form', [
                    'type' => 'text',
                    'fieldname' => 'dimensionofsiteasperdeedsouth',
                    'labelname' => 'AS PER DEED :',
                    'labelidname' => 'dimensionofsiteasperdeedsouthid',
                    'required' => false,
                    'col' => 'col-md-6',
                ])
                @include('helper.formhelper.form', [
                    'type' => 'text',
                    'fieldname' => 'dimensionofsiteasexistingsouth',
                    'labelname' => 'AS EXISTING :',
                    'labelidname' => 'dimensionofsiteasexistingsouthid',
                    'required' => false,
                    'col' => 'col-md-6',
                ])
                <h5 class="card-header theme_bg_color text-white">EAST</h5>
                @include('helper.formhelper.form', [
                    'type' => 'text',
                    'fieldname' => 'dimensionofsiteasperdeedeast',
                    'labelname' => 'AS PER DEED :',
                    'labelidname' => 'dimensionofsiteasperdeedeastid',
                    'required' => false,
                    'col' => 'col-md-6',
                ])
                @include('helper.formhelper.form', [
                    'type' => 'text',
                    'fieldname' => 'dimensionofsiteasexistingeast',
                    'labelname' => 'AS EXISTING :',
                    'labelidname' => 'dimensionofsiteasexistingeastid',
                    'required' => false,
                    'col' => 'col-md-6',
                ])
                <h5 class="card-header theme_bg_color text-white">WEST</h5>
                @include('helper.formhelper.form', [
                    'type' => 'text',
                    'fieldname' => 'dimensionofsiteasperdeedwest',
                    'labelname' => 'AS PER DEED :',
                    'labelidname' => 'dimensionofsiteasperdeedwestid',
                    'required' => false,
                    'col' => 'col-md-6',
                ])
                @include('helper.formhelper.form', [
                    'type' => 'text',
                    'fieldname' => 'dimensionofsiteasexistingwest',
                    'labelname' => 'AS EXISTING :',
                    'labelidname' => 'dimensionofsiteasexistingwestid',
                    'required' => false,
                    'col' => 'col-md-6',
                ])
                <div class="col-md-4">
                    <label for="extentofsiteid" class="form-label">EXTENT OF THE SITE(Sqft UDS)</label>
                    @if (true)
                        <span class="text-danger fw-bold">*</span>
                    @endif
                    <input wire:model="extentofsite" type="number" class="form-control" id="extentofsiteid">
                    @error('extentofsite')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                @if ($extentofsite)
                    <div class="col-md-3">
                        <label class="form-label">EXTENT OF THE SITE (in Sqm)</label>
                        <input type="number" value={{ round($extentofsite / 10.764, 6) }} class="form-control"
                            disabled readonly>
                    </div>
                @endif
                <h5 class="card-header theme_bg_color text-white">LOCATIONS</h5>
                @include('helper.formhelper.form', [
                    'type' => 'text',
                    'fieldname' => 'latitude',
                    'labelname' => 'LATITUDE :',
                    'labelidname' => 'latitudeid',
                    'required' => false,
                    'col' => 'col-md-6',
                ])
                @include('helper.formhelper.form', [
                    'type' => 'text',
                    'fieldname' => 'longitude',
                    'labelname' => 'LONGITUDE :',
                    'labelidname' => 'longitudeid',
                    'required' => false,
                    'col' => 'col-md-6',
                ])
                @include('helper.formhelper.form', [
                    'type' => 'text',
                    'fieldname' => 'what3words',
                    'labelname' => 'WHAT3WORDS :',
                    'labelidname' => 'what3wordsid',
                    'required' => false,
                    'col' => 'col-md-6',
                ])
                @include('helper.formhelper.form', [
                    'type' => 'text',
                    'fieldname' => 'googlemaplocation',
                    'labelname' => 'GOOGLE MAP LINK :',
                    'labelidname' => 'googlemaplocationid',
                    'required' => false,
                    'col' => 'col-md-6',
                ])
                <div class="col-md-6">
                    <label for="extentofsiteconsiderid" class="form-label">EXTENT OF THE SITE CONSIDERED FOR
                        VALUATION: (Sqft UDS)</label>
                    @if (false)
                        <span class="text-danger fw-bold">*</span>
                    @endif
                    <input type="number" value="{{ $extentofsite }}" class="form-control"
                        id="extentofsiteconsiderid" readonly>
                </div>
                @if ($extentofsite)
                    <div class="col-md-6">
                        <label class="form-label">EXTENT OF THE SITE CONSIDERED FOR VALUATION(in Sqm)</label>
                        <input type="number" value={{ round($extentofsite / 10.764, 6) }} class="form-control"
                            disabled readonly>
                    </div>
                @endif
                @include('helper.formhelper.form', [
                    'type' => 'select',
                    'default_option' => 'Select  an option',
                    'fieldname' => 'occupiedby',
                    'labelname' => 'OCCUPIED BY:',
                    'labelidname' => 'occupiedbyid',
                    'option' => config('archive.occupiedby'),
                    'required' => false,
                    'col' => 'col-md-4',
                ])
            </div>
        </div>
        <div class="float-end d-flex gap-1">
            <a href="{{ route('valuation') }}" class="btn btn-sm btn-danger text-white float-end mt-3"
                type="button">cancel</a>
            <button class="btn  btn-sm theme_bg_color text-white float-end mt-3" type="button"
                wire:click="firstStepSubmit">Next
            </button>
        </div>
    </div>
    <script>
        function scrolltop() {
            const top = document.getElementById('step1');
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
