<div>
    <div class="card shadow-sm">
        <div class="card-header text-white theme_bg_color p-1">
            <div class="d-flex flex-row bd-highlight">
                <div class="flex-grow-1 bd-highlight mt-1"><span class="h5">VALUATION REPORT</span>
                </div>
                {{-- <div class="bd-highlight d-flex gap-1">
                    <a class="btn btn-sm btn-secondary shadow float-end mx-1" href="{{ route('adminreports') }}"
                        role="button">Back</a>
                </div> --}}
            </div>
        </div>
        <div class="card-body p-0">
            <div class="row g-3 align-items-center p-2">
                <div class="col-auto">
                    <label for="startdateid" class="col-form-label fw-bold fs-6"> From Date :
                    </label>

                </div>
                <div class="col-auto">
                    <input type="date" wire:model="from_date" class="form-control form-control-sm" id="startdateid">
                </div>


                <div class="col-auto">
                    <label for="enddateid" class="col-form-label fw-bold fs-6">
                        To Date : </label>
                </div>
                <div class="col-auto">
                    <input type="date" wire:model="to_date" class="form-control form-control-sm" id="enddateid">
                </div>

                <div class="col-auto">
                    <input type="text" wire:model="searchTerm" id="searchitem" class="form-control form-control-sm"
                        placeholder="Search" aria-describedby="passwordHelpInline">
                </div>

                {{-- <div class="col-auto text-start mt-3">
                    <button wire:click="export" class="btn btn-sm btn-success fw-bold"> Excel
                        <i class="bi bi-arrow-down"></i></button>
                    <button wire:click="pdf" class="btn btn-sm btn-success fw-bold"> PDF
                        <i class="bi bi-arrow-down"></i></button>
                    <button wire:click="clear" class="btn btn-sm btn-secondary"> Clear</button>
                </div> --}}

                <div class="col-auto">
                    <select wire:click="updatepagination" wire:model.lazy="paginationlength"
                        class="form-select form-select-sm ">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                    </select>
                </div>
            </div>
            <div class="table-responsive">
                <table id="patientreport_id" class="table text-center table-hover m-0 p-0">
                    <thead class="text-white theme_bg_color">
                        <tr>
                            <th>S.NO</th>
                            <th>UNIQID</th>
                            <th>PROPERTY NAME</th>
                            <th>CUSTOMER NAME</th>
                            <th>CREATED AT</th>
                            <th>PRINT REPORT</th>
                            <th>VIEW REPORT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($valuationreport as $key => $eachvaluation)
                            <tr>
                                <td>{{ $valuationreport->firstItem() + $key }}</td>
                                <td>{{ $eachvaluation->uniqid }}</td>
                                <td>{{ $eachvaluation->name }}</td>
                                <td>{{ $eachvaluation->customer->name }}</td>
                                <td>{{ $eachvaluation->created_at->format('d-m-Y h:i A') }}</td>
                                <td><a class="btn btn-sm btn-primary" target="_blank"
                                        href="{{ route('valuationreportpdfstream', ['valuation' => $eachvaluation->id, 'show' => 1]) }}"
                                        role="button"><i class="bi bi-archive"></i></a></td>
                                <td><a class="btn btn-sm btn-primary" target="_blank"
                                        href="{{ route('valuationreportpdfstream', ['valuation' => $eachvaluation->id, 'show' => 2]) }}"
                                        role="button"><i class="bi bi-archive"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {!! $valuationreport->links() !!}
            </div>
        </div>
    </div>
</div>
