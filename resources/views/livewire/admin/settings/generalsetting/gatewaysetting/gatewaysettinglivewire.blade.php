<div>
    <x-admin.layouts.adminindex>

        <x-slot name="title">
            GATEWAY SETTINGS
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
                'name' => 'GATEWAY NAME',
                'type' => 'sortby',
                'sortname' => 'gateway_name',
            ])
            @include('helper.tablehelper.tableheader', [
                'name' => 'GATEWAY USERNAME',
                'type' => 'sortby',
                'sortname' => 'gateway_username',
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
            @foreach ($gatewaysetting as $index => $eachgatewaysetting)
                <tr>
                    <td>{{ $gatewaysetting->firstItem() + $index }}</td>
                    <td class="text-start">{{ $eachgatewaysetting->uniqid }}</td>
                    <td class="text-start">{{ $eachgatewaysetting->gateway_name }}</td>
                    <td class="text-start">{{ $eachgatewaysetting->gateway_username }}</td>
                    <td>{!! $eachgatewaysetting->is_default ? '<span class="badge bg-success fs-6">Yes</span>' : '<span class="badge bg-danger fs-6">No</span>' !!}
                    <td>
                        <button wire:click="show({{ $eachgatewaysetting->id }})" class="btn btn-sm btn-success"><i
                                class="bi bi-eye-fill"></i></button>
                        <button wire:click="edit({{ $eachgatewaysetting->id }})" class="btn btn-sm btn-primary"><i
                                class="bi bi-pencil-fill"></i></button>
                    </td>
                </tr>
            @endforeach
        </x-slot>

        <x-slot name="tablerecordtotal">
            Showing {{ $gatewaysetting->firstItem() }} to {{ $gatewaysetting->lastItem() }} out of
            {{ $gatewaysetting->total() }} items
        </x-slot>

        <x-slot name="pagination">
            {{ $gatewaysetting->links() }}
        </x-slot>

    </x-admin.layouts.adminindex>

    <!-- Create or Edit Modal -->
    @include(
        'livewire.admin.settings.generalsetting.gatewaysetting.createoredit'
    )

    <!-- Show Modal -->
    @include(
        'livewire.admin.settings.generalsetting.gatewaysetting.show'
    )

</div>
