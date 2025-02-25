<div wire:ignore.self class="modal fade" id="createoreditModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="createoreditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form wire:submit.prevent="store" enctype="multipart/form-data">
                <div class="modal-header text-white theme_bg_color px-3 py-2">
                    <h5 class="modal-title" id="createoreditModalLabel">
                        {{ isset($engineer_id) ? 'UPDATE' : 'CREATE' }}
                        ENGINEER </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        @include('helper.formhelper.form', [
                            'type' => 'text',
                            'fieldname' => 'name',
                            'labelname' => 'NAME',
                            'labelidname' => 'nameid',
                            'required' => true,
                            'col' => 'col-md-4',
                        ])
                        @include('helper.formhelper.form', [
                            'type' => 'textarea',
                            'fieldname' => 'address',
                            'labelname' => 'ADDRESS',
                            'labelidname' => 'addressid',
                            'required' => false,
                            'col' => 'col-md-8',
                        ])
                        @include('helper.formhelper.form', [
                            'type' => 'file',
                            'fieldname' => 'image',
                            'labelname' => 'IMAGE:',
                            'labelidname' => 'imageid',
                            'required' => false,
                            'col' => 'col-md-6',
                        ])
                        @if ($image)
                            <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                                src="{{ $image->temporaryUrl() }}">
                        @elseif ($existing_image)
                            <img class="img-fluid mx-auto d-block rounded-md" style="width: 150px; height:85px;"
                                src="{{ url('storage/' . $existing_image) }}">
                        @endif
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
                        class="btn btn-primary">{{ isset($engineer_id) ? 'Update' : 'Create' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
