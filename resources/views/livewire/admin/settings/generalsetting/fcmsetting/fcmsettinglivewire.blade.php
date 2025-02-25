<div>
    <x-admin.layouts.adminindex>

        <x-slot name="title">
            FCM SETTINGS
        </x-slot>

        <x-slot name="action">
            <a class="btn btn-sm btn-secondary shadow float-end mx-1" href="{{ route('settings') }}"
                role="button">Back</a>
            {{-- <button wire:click="create" type="button" class="btn btn-sm btn-primary shadow float-end mx-1"
                data-bs-toggle="modal" data-bs-target="#createoreditModal">
                Create
            </button> --}}
        </x-slot>

        <x-slot name="tableheader">
            @include('helper.tablehelper.tableheader', [
                'name' => 'S.NO',
                'type' => 'normal',
                'sortname' => '',
            ])
            @include('helper.tablehelper.tableheader', [
                'name' => 'UNIQID',
                'type' => 'sortby',
                'sortname' => 'uniqid',
            ])
            @include('helper.tablehelper.tableheader', [
                'name' => 'EMAIL',
                'type' => 'sortby',
                'sortname' => 'email',
            ])
            @include('helper.tablehelper.tableheader', [
                'name' => 'SERVER KEY',
                'type' => 'normal',
                'sortname' => '',
            ])
            @include('helper.tablehelper.tableheader', [
                'name' => 'IS DEFAULT',
                'type' => 'normal',
                'sortname' => '',
            ])
            @include('helper.tablehelper.tableheader', [
                'name' => 'VIEW/EDIT',
                'type' => 'normal',
                'sortname' => '',
            ])
        </x-slot>

        <x-slot name="tablebody">
            @foreach ($fcmsetting as $index => $eachfcmsetting)
                <tr>
                    <td>{{ $fcmsetting->firstItem() + $index }}</td>
                    <td class="text-start">{{ $eachfcmsetting->uniqid }}</td>
                    <td class="text-start">{{ $eachfcmsetting->email }}</td>
                    <td class="text-start">{{ Str::limit($eachfcmsetting->serverkey, 18) }}</td>
                    <td>{!! $eachfcmsetting->is_default ? '<span class="badge bg-success fs-6">Yes</span>' : '<span class="badge bg-danger fs-6">No</span>' !!}
                    <td>
                        <button wire:click="show({{ $eachfcmsetting->id }})" class="btn btn-sm btn-success"><i
                                class="bi bi-eye-fill"></i></button>
                        <button wire:click="edit({{ $eachfcmsetting->id }})" class="btn btn-sm btn-primary"><i
                                class="bi bi-pencil-fill"></i></button>
                    </td>
                </tr>
            @endforeach
        </x-slot>

        <x-slot name="tablerecordtotal">
            Showing {{ $fcmsetting->firstItem() }} to {{ $fcmsetting->lastItem() }} out of
            {{ $fcmsetting->total() }} items
        </x-slot>

        <x-slot name="pagination">
            {{ $fcmsetting->links() }}
        </x-slot>

    </x-admin.layouts.adminindex>

    <!-- Create or Edit Modal -->
    @include(
        'livewire.admin.settings.generalsetting.fcmsetting.createoredit'
    )

    <!-- Show Modal -->
    @include(
        'livewire.admin.settings.generalsetting.fcmsetting.show'
    )

</div>
