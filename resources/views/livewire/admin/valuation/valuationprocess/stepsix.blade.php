<div class="card mt-3 shadow-sm  setup-content {{ $currentStep != 6 ? 'display-none' : '' }}" id="step6">
    <h5 class="card-header theme_bg_color text-white">Document Upload</h5>
    <div class="card-body">
        <div class="row g-3">
            <h5 class="card-header theme_bg_color text-white">UPLOAD – SCREEN SHOTS TAKEN FROM INTERNET WEBSITES FOR
                PROPERTY (Upload upto 3 to 4 screen shots)</h5>
            @include('helper.formhelper.form', [
                'type' => 'file',
                'fieldname' => 'screenshot1',
                'labelname' => 'SCREENSHOT 1:',
                'labelidname' => 'screenshot1id',
                'required' => false,
                'col' => 'col-md-6',
            ])
            @if ($screenshot1 && !in_array('screenshot1', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ $screenshot1->temporaryUrl() }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("screenshot1")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @elseif ($existingscreenshot1 && !in_array('existingscreenshot1', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existingscreenshot1) }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("existingscreenshot1")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @endif
            @include('helper.formhelper.form', [
                'type' => 'file',
                'fieldname' => 'screenshot2',
                'labelname' => 'SCREENSHOT 2:',
                'labelidname' => 'screenshot2id',
                'required' => false,
                'col' => 'col-md-6',
            ])
            @if ($screenshot2 && !in_array('screenshot2', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ $screenshot2->temporaryUrl() }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("screenshot2")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @elseif ($existingscreenshot2 && !in_array('existingscreenshot2', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existingscreenshot2) }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("existingscreenshot2")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @endif
            @include('helper.formhelper.form', [
                'type' => 'file',
                'fieldname' => 'screenshot3',
                'labelname' => 'SCREENSHOT 3:',
                'labelidname' => 'screenshot3id',
                'required' => false,
                'col' => 'col-md-6',
            ])
            @if ($screenshot3 && !in_array('screenshot3', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ $screenshot3->temporaryUrl() }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("screenshot3")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @elseif ($existingscreenshot3 && !in_array('existingscreenshot3', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existingscreenshot3) }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("existingscreenshot3")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @endif
            @include('helper.formhelper.form', [
                'type' => 'file',
                'fieldname' => 'screenshot4',
                'labelname' => 'SCREENSHOT 4:',
                'labelidname' => 'screenshot4id',
                'required' => false,
                'col' => 'col-md-6',
            ])
            @if ($screenshot4 && !in_array('screenshot4', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ $screenshot4->temporaryUrl() }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("screenshot4")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @elseif ($existingscreenshot4 && !in_array('existingscreenshot4', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existingscreenshot4) }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("existingscreenshot4")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @endif
            <h5 class="card-header theme_bg_color text-white">UPLOAD ANY GOVERNMENT NOTIFICATIONS (Upload 1 or 2
                maximum)
            </h5>
            @include('helper.formhelper.form', [
                'type' => 'file',
                'fieldname' => 'governmentnotification1',
                'labelname' => 'GOVERNMENT NOTIFICATION 1:',
                'labelidname' => 'governmentnotification1id',
                'required' => false,
                'col' => 'col-md-6',
            ])
            {{-- @if ($governmentnotification1)
                <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                    src="{{ $governmentnotification1->temporaryUrl() }}">
            @elseif ($existinggovernmentnotification1)
                <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                    src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existinggovernmentnotification1) }}">
            @endif --}}
            @if ($governmentnotification1 && !in_array('governmentnotification1', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ $governmentnotification1->temporaryUrl() }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("governmentnotification1")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @elseif ($existinggovernmentnotification1 && !in_array('existinggovernmentnotification1', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existinggovernmentnotification1) }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("existinggovernmentnotification1")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @endif
            @include('helper.formhelper.form', [
                'type' => 'file',
                'fieldname' => 'governmentnotification2',
                'labelname' => 'GOVERNMENT NOTIFICATION 2:',
                'labelidname' => 'governmentnotification2id',
                'required' => false,
                'col' => 'col-md-6',
            ])
            {{-- @if ($governmentnotification2)
                <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                    src="{{ $governmentnotification2->temporaryUrl() }}">
            @elseif ($existinggovernmentnotification2)
                <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                    src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existinggovernmentnotification2) }}">
            @endif --}}
            @if ($governmentnotification2 && !in_array('governmentnotification2', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ $governmentnotification2->temporaryUrl() }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("governmentnotification2")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @elseif ($existinggovernmentnotification2 && !in_array('existinggovernmentnotification2', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existinggovernmentnotification2) }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("existinggovernmentnotification2")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @endif
            <h5 class="card-header theme_bg_color text-white">UPLOAD LOCATION SCREEN SHOT</h5>
            @include('helper.formhelper.form', [
                'type' => 'file',
                'fieldname' => 'mapscreenshot',
                'labelname' => '',
                'labelidname' => 'mapscreenshotid',
                'required' => false,
                'col' => 'col-md-6',
            ])
            {{-- @if ($mapscreenshot)
                <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                    src="{{ $mapscreenshot->temporaryUrl() }}">
            @elseif ($existingmapscreenshot)
                <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                    src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existingmapscreenshot) }}">
            @endif --}}
            @if ($mapscreenshot && !in_array('mapscreenshot', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ $mapscreenshot->temporaryUrl() }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("mapscreenshot")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @elseif ($existingmapscreenshot && !in_array('existingmapscreenshot', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existingmapscreenshot) }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("existingmapscreenshot")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @endif
            <h5 class="card-header theme_bg_color text-white">UPLOAD – PROPERTY PHOTOS TAKEN BY THE VALUATION ENGINEER
                AT
                SITE (Upto 12 photos)</h5>
            @include('helper.formhelper.form', [
                'type' => 'file',
                'fieldname' => 'propertyphoto1',
                'labelname' => '',
                'labelidname' => 'propertyphoto1id',
                'required' => false,
                'col' => 'col-md-6',
            ])
            {{-- @if ($propertyphoto1)
                <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                    src="{{ $propertyphoto1->temporaryUrl() }}">
            @elseif ($existingpropertyphoto1)
                <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                    src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existingpropertyphoto1) }}">
            @endif --}}
            @if ($propertyphoto1 && !in_array('propertyphoto1', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ $propertyphoto1->temporaryUrl() }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("propertyphoto1")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @elseif ($existingpropertyphoto1 && !in_array('existingpropertyphoto1', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existingpropertyphoto1) }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("existingpropertyphoto1")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @endif
            @include('helper.formhelper.form', [
                'type' => 'file',
                'fieldname' => 'propertyphoto2',
                'labelname' => '',
                'labelidname' => 'propertyphoto2id',
                'required' => false,
                'col' => 'col-md-6',
            ])
            {{-- @if ($propertyphoto2)
                <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                    src="{{ $propertyphoto2->temporaryUrl() }}">
            @elseif ($existingpropertyphoto2)
                <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                    src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existingpropertyphoto2) }}">
            @endif --}}
            @if ($propertyphoto2 && !in_array('propertyphoto2', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ $propertyphoto2->temporaryUrl() }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("propertyphoto2")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @elseif ($existingpropertyphoto2 && !in_array('existingpropertyphoto2', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existingpropertyphoto2) }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("existingpropertyphoto2")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @endif
            @include('helper.formhelper.form', [
                'type' => 'file',
                'fieldname' => 'propertyphoto3',
                'labelname' => '',
                'labelidname' => 'propertyphoto3id',
                'required' => false,
                'col' => 'col-md-6',
            ])
            {{-- @if ($propertyphoto3)
                <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                    src="{{ $propertyphoto3->temporaryUrl() }}">
            @elseif ($existingpropertyphoto3)
                <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                    src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existingpropertyphoto3) }}">
            @endif --}}
            @if ($propertyphoto3 && !in_array('propertyphoto3', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ $propertyphoto3->temporaryUrl() }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("propertyphoto3")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @elseif ($existingpropertyphoto3 && !in_array('existingpropertyphoto3', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existingpropertyphoto3) }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("existingpropertyphoto3")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @endif
            @include('helper.formhelper.form', [
                'type' => 'file',
                'fieldname' => 'propertyphoto4',
                'labelname' => '',
                'labelidname' => 'propertyphoto4id',
                'required' => false,
                'col' => 'col-md-6',
            ])
            {{-- @if ($propertyphoto4)
                <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                    src="{{ $propertyphoto4->temporaryUrl() }}">
            @elseif ($existingpropertyphoto4)
                <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                    src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existingpropertyphoto4) }}">
            @endif --}}
            @if ($propertyphoto4 && !in_array('propertyphoto4', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ $propertyphoto4->temporaryUrl() }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("propertyphoto4")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @elseif ($existingpropertyphoto4 && !in_array('existingpropertyphoto4', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existingpropertyphoto4) }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("existingpropertyphoto4")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @endif
            @include('helper.formhelper.form', [
                'type' => 'file',
                'fieldname' => 'propertyphoto5',
                'labelname' => '',
                'labelidname' => 'propertyphoto5id',
                'required' => false,
                'col' => 'col-md-6',
            ])
            {{-- @if ($propertyphoto5)
                <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                    src="{{ $propertyphoto5->temporaryUrl() }}">
            @elseif ($existingpropertyphoto5)
                <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                    src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existingpropertyphoto5) }}">
            @endif --}}
            @if ($propertyphoto5 && !in_array('propertyphoto5', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ $propertyphoto5->temporaryUrl() }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("propertyphoto5")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @elseif ($existingpropertyphoto5 && !in_array('existingpropertyphoto5', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existingpropertyphoto5) }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("existingpropertyphoto5")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @endif
            @include('helper.formhelper.form', [
                'type' => 'file',
                'fieldname' => 'propertyphoto6',
                'labelname' => '',
                'labelidname' => 'propertyphoto6id',
                'required' => false,
                'col' => 'col-md-6',
            ])
            {{-- @if ($propertyphoto6)
                <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                    src="{{ $propertyphoto6->temporaryUrl() }}">
            @elseif ($existingpropertyphoto6)
                <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                    src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existingpropertyphoto6) }}">
            @endif --}}
            @if ($propertyphoto6 && !in_array('propertyphoto6', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ $propertyphoto6->temporaryUrl() }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("propertyphoto6")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @elseif ($existingpropertyphoto6 && !in_array('existingpropertyphoto6', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existingpropertyphoto6) }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("existingpropertyphoto6")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @endif
            @include('helper.formhelper.form', [
                'type' => 'file',
                'fieldname' => 'propertyphoto7',
                'labelname' => '',
                'labelidname' => 'propertyphoto7id',
                'required' => false,
                'col' => 'col-md-6',
            ])
            {{-- @if ($propertyphoto7)
                <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                    src="{{ $propertyphoto7->temporaryUrl() }}">
            @elseif ($existingpropertyphoto7)
                <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                    src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existingpropertyphoto7) }}">
            @endif --}}
            @if ($propertyphoto7 && !in_array('propertyphoto7', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ $propertyphoto7->temporaryUrl() }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("propertyphoto7")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @elseif ($existingpropertyphoto7 && !in_array('existingpropertyphoto7', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existingpropertyphoto7) }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("existingpropertyphoto7")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @endif
            @include('helper.formhelper.form', [
                'type' => 'file',
                'fieldname' => 'propertyphoto8',
                'labelname' => '',
                'labelidname' => 'propertyphoto8id',
                'required' => false,
                'col' => 'col-md-6',
            ])
            {{-- @if ($propertyphoto8)
                <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                    src="{{ $propertyphoto8->temporaryUrl() }}">
            @elseif ($existingpropertyphoto8)
                <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                    src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existingpropertyphoto8) }}">
            @endif --}}
            @if ($propertyphoto8 && !in_array('propertyphoto8', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ $propertyphoto8->temporaryUrl() }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("propertyphoto8")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @elseif ($existingpropertyphoto8 && !in_array('existingpropertyphoto8', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existingpropertyphoto8) }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("existingpropertyphoto8")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @endif
            @include('helper.formhelper.form', [
                'type' => 'file',
                'fieldname' => 'propertyphoto9',
                'labelname' => '',
                'labelidname' => 'propertyphoto9id',
                'required' => false,
                'col' => 'col-md-6',
            ])
            {{-- @if ($propertyphoto9)
                <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                    src="{{ $propertyphoto9->temporaryUrl() }}">
            @elseif ($existingpropertyphoto9)
                <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                    src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existingpropertyphoto9) }}">
            @endif --}}
            @if ($propertyphoto9 && !in_array('propertyphoto9', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ $propertyphoto9->temporaryUrl() }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("propertyphoto9")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @elseif ($existingpropertyphoto9 && !in_array('existingpropertyphoto9', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existingpropertyphoto9) }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("existingpropertyphoto9")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @endif
            @include('helper.formhelper.form', [
                'type' => 'file',
                'fieldname' => 'propertyphoto10',
                'labelname' => '',
                'labelidname' => 'propertyphoto10id',
                'required' => false,
                'col' => 'col-md-6',
            ])
            {{-- @if ($propertyphoto10)
                <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                    src="{{ $propertyphoto10->temporaryUrl() }}">
            @elseif ($existingpropertyphoto10)
                <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                    src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existingpropertyphoto10) }}">
            @endif --}}
            @if ($propertyphoto10 && !in_array('propertyphoto10', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ $propertyphoto10->temporaryUrl() }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("propertyphoto10")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @elseif ($existingpropertyphoto10 && !in_array('existingpropertyphoto10', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existingpropertyphoto10) }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("existingpropertyphoto10")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @endif
            @include('helper.formhelper.form', [
                'type' => 'file',
                'fieldname' => 'propertyphoto11',
                'labelname' => '',
                'labelidname' => 'propertyphoto11id',
                'required' => false,
                'col' => 'col-md-6',
            ])
            {{-- @if ($propertyphoto11)
                <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                    src="{{ $propertyphoto11->temporaryUrl() }}">
            @elseif ($existingpropertyphoto11)
                <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                    src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existingpropertyphoto11) }}">
            @endif --}}
            @if ($propertyphoto11 && !in_array('propertyphoto11', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ $propertyphoto11->temporaryUrl() }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("propertyphoto11")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @elseif ($existingpropertyphoto11 && !in_array('existingpropertyphoto11', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existingpropertyphoto11) }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("existingpropertyphoto11")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @endif
            @include('helper.formhelper.form', [
                'type' => 'file',
                'fieldname' => 'propertyphoto12',
                'labelname' => '',
                'labelidname' => 'propertyphoto12id',
                'required' => false,
                'col' => 'col-md-6',
            ])
            {{-- @if ($propertyphoto12)
                <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                    src="{{ $propertyphoto12->temporaryUrl() }}">
            @elseif ($existingpropertyphoto12)
                <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                    src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existingpropertyphoto12) }}">
            @endif --}}
            @if ($propertyphoto12 && !in_array('propertyphoto12', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ $propertyphoto12->temporaryUrl() }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("propertyphoto12")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @elseif ($existingpropertyphoto12 && !in_array('existingpropertyphoto12', $this->delete_array))
                <div class="col-md-5">
                    <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                        src="{{ url('storage/' . $valuation->uniqid . '/wizardsix/screenshot/' . $existingpropertyphoto12) }}">
                </div>
                <div class="col-md-1 align-self-center">
                    <button class="btn btn-sm btn-danger" wire:click='delete("existingpropertyphoto12")'><i
                            class="bi bi-trash"></i></button>
                </div>
            @endif
        </div>
        <div class="float-end d-flex gap-1">
            <button class="btn  btn-sm btn-secondary text-white float-end mt-3" type="button"
                wire:click="back(5)">back</button>
            <button class="btn btn-sm theme_bg_color text-white float-end mt-3" type="button"
                wire:click="submitForm">Submit</button>
        </div>
    </div>
    <script>
        function scrolltop() {
            const top = document.getElementById('step6');
            top.scrollTop = 10;
        }
        window.onload = scrolltop();
    </script>
</div>
