<div wire:ignore.self class="modal fade" id="createoreditModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="createoreditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form wire:submit.prevent="store" enctype="multipart/form-data">
                <div class="modal-header text-white theme_bg_color px-3 py-2">
                    <h5 class="modal-title" id="createoreditModalLabel">
                        {{ isset($valuation_id) ? 'UPDATE' : 'CREATE' }}
                        PROPERTY VALUATION </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        @include('helper.formhelper.form', [
                            'type' => 'text',
                            'fieldname' => 'name',
                            'labelname' => 'PROPERTY NAME',
                            'labelidname' => 'nameid',
                            'required' => true,
                            'col' => 'col-md-4',
                        ])

                        @include('helper.formhelper.form', [
                            'type' => 'select',
                            'default_option' => 'Select Customer',
                            'fieldname' => 'customer_id',
                            'labelname' => 'Customer',
                            'labelidname' => 'customer_id',
                            'default_option' => 'Select Mode',
                            'option' => $customerlist,
                            'required' => true,
                            'col' => 'col-md-4',
                        ])

                        @include('helper.formhelper.form', [
                            'type' => 'select',
                            'default_option' => 'Select Cateogry',
                            'fieldname' => 'category_id',
                            'labelname' => 'Category',
                            'labelidname' => 'category_id',
                            'default_option' => 'Select Mode',
                            'option' => $categorylist,
                            'required' => true,
                            'col' => 'col-md-4',
                        ])


                        @include('helper.formhelper.form', [
                            'type' => 'text',
                            'fieldname' => 'latitude',
                            'labelname' => 'LATITUDE',
                            'labelidname' => 'latitudeid',
                            'required' => false,
                            'col' => 'col-md-4',
                        ])
                        @include('helper.formhelper.form', [
                            'type' => 'text',
                            'fieldname' => 'logitude',
                            'labelname' => 'LOGITUDE',
                            'labelidname' => 'logitudeid',
                            'required' => false,
                            'col' => 'col-md-4',
                        ])
                        @include('helper.formhelper.form', [
                            'type' => 'text',
                            'fieldname' => 'googlemaplocation',
                            'labelname' => 'GOOGLE MAP LOCATION URL',
                            'labelidname' => 'googlemaplocationid',
                            'required' => false,
                            'col' => 'col-md-4',
                        ])
                        @include('helper.formhelper.form', [
                            'type' => 'text',
                            'fieldname' => 'threewordlocation',
                            'labelname' => 'WHAT3WORD',
                            'labelidname' => 'threewordlocationid',
                            'required' => false,
                            'col' => 'col-md-4',
                        ])



                        @include('helper.formhelper.form', [
                            'type' => 'textarea',
                            'fieldname' => 'note',
                            'labelname' => 'NOTE',
                            'labelidname' => 'noteid',
                            'required' => false,
                            'col' => 'col-md-8',
                        ])
                    </div>
                </div>
                <div class="modal-footer bg-light px-2 py-1">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit"
                        class="btn btn-primary">{{ isset($valuation_id) ? 'Update' : 'Create' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
