<div>

    <div class="d-flex justify-content-center">
        <div class="multi-wizard-step">
            <a href="#step-1" wire:click="back(1)" type="button"
                class="btn {{ $currentStep != 1 ? 'btn-default' : 'btn-primary text-white' }} rounded-pill btn-outline-primary" >1</a>
        </div>
        <div class="align-self-center mb-2" style="border-bottom: 1px solid black;padding:5px; width:5%"></div>
        <div class="multi-wizard-step">
            <a href="#step-2" wire:click="back(2)" type="button"
                class="btn {{ $currentStep != 2 ? 'btn-default' : 'btn-primary text-white' }} rounded-pill btn-outline-primary {{!empty($validatedwizard1) || $wizardtwoid ? '':'disabled'}}">2</a>
        </div>
        <div class="align-self-center mb-2" style="border-bottom: 1px solid black;padding:5px; width:5%"></div>
        <div class="multi-wizard-step">
            <a href="#step-3" wire:click="back(3)" type="button"
                class="btn {{ $currentStep != 3 ? 'btn-default' : 'btn-primary text-white' }} rounded-pill btn-outline-primary {{!empty($validatedwizard2) || $wizardthreeid ? '':'disabled'}}">3</a>
        </div>
        <div class="align-self-center mb-2" style="border-bottom: 1px solid black;padding:5px; width:5%"></div>
        <div class="multi-wizard-step">
            <a href="#step-3" wire:click="back(4)" type="button"
                class="btn {{ $currentStep != 4 ? 'btn-default' : 'btn-primary text-white' }} rounded-pill btn-outline-primary {{!empty($validatedwizard3) || $wizardfourid ? '':'disabled'}}">4</a>
        </div>
        <div class="align-self-center mb-2" style="border-bottom: 1px solid black;padding:5px; width:5%"></div>
        <div class="multi-wizard-step">
            <a href="#step-3" wire:click="back(5)" type="button"
                class="btn {{ $currentStep != 5 ? 'btn-default' : 'btn-primary text-white' }} rounded-pill btn-outline-primary {{!empty($validatedwizard4) || $wizardfiveid ? '':'disabled'}}">5</a>
        </div>
        <div class="align-self-center mb-2" style="border-bottom: 1px solid black;padding:5px; width:5%"></div>
        <div class="multi-wizard-step">
            <a href="#step-3" wire:click="back(6)" type="button"
                class="btn {{ $currentStep != 6 ? 'btn-default' : 'btn-primary text-white' }} rounded-pill btn-outline-primary {{!empty($validatedwizard5) || $wizardsixid ? '':'disabled'}}">6</a>
        </div>
    </div>

    {{-- <div class="container p-1">
        <div class="col-md-8 mx-auto">
            <div class="position-relative m-4">
                <div class="progress" style="height: 1px;">
                    <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="20" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
                <button type="button" wire:click="back(1)"
                    class="position-absolute top-0 start-0 translate-middle btn btn-sm {{ $currentStep != 1 ? 'btn-secondary' : 'btn-primary' }} rounded-pill"
                    style="width: 2rem; height:2rem;">1</button>
                <button type="button" wire:click="back(2)"
                    class="position-absolute top-0 start-30 translate-middle btn btn-sm {{ $currentStep != 2 ? 'btn-secondary' : 'btn-primary' }} rounded-pill"
                    style="width: 2rem; height:2rem;">2</button>
                <button type="button" wire:click="back(3)"
                    class="position-absolute top-0 start-0 translate-middle btn btn-sm {{ $currentStep != 3 ? 'btn-secondary' : 'btn-primary' }} rounded-pill"
                    style="width: 2rem; height:2rem;">3</button>
                <button type="button" wire:click="back(4)"
                    class="position-absolute top-0 start-0 translate-middle btn btn-sm {{ $currentStep != 4 ? 'btn-secondary' : 'btn-primary' }} rounded-pill"
                    style="width: 2rem; height:2rem;">4</button>
            </div>
        </div>
    </div> --}}




    @if ($currentStep == 1)
        @include('livewire.admin.valuation.valuationprocess.stepone')
    @elseif($currentStep == 2)
        @include('livewire.admin.valuation.valuationprocess.steptwo')
    @elseif($currentStep == 3)
        @include('livewire.admin.valuation.valuationprocess.stepthree')
    @elseif($currentStep == 4)
        @include('livewire.admin.valuation.valuationprocess.stepfour')
    @elseif($currentStep == 5)
        @include('livewire.admin.valuation.valuationprocess.stepfive')
    @elseif($currentStep == 6)
        @include('livewire.admin.valuation.valuationprocess.stepsix')
        {{-- <div class="row p-3 setup-content {{ $currentStep != 3 ? 'display-none' : '' }}" id="step-3">
            <div class="col-md-12">
                <h3> Step 3</h3>
                <table class="table">
                    <tr>
                        <td>Team Name:</td>
                        <td><strong>{{ $name }}</strong></td>
                    </tr>
                    <tr>
                        <td>Team Price:</td>
                        <td><strong>{{ $price }}</strong></td>
                    </tr>
                    <tr>
                        <td>Team status:</td>
                        <td><strong>{{ $status ? 'Active' : 'DeActive' }}</strong></td>
                    </tr>
                    <tr>
                        <td>Team Detail:</td>
                        <td><strong>{{ $detail }}</strong></td>
                    </tr>
                </table>
                <button class="btn btn-success btn-lg pull-right" wire:click="submitForm"
                    type="button">Finish!</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button"
                    wire:click="back(2)">Back</button>
            </div>
        </div> --}}
    @endif


</div>
