<div>
    <x-admin.layouts.adminindex>

        <x-slot name="title">
            DELIVERY TIME
        </x-slot>

        <x-slot name="action">
            <a class="btn btn-sm btn-secondary shadow float-end mx-1" href="{{ route('settings') }}"
                role="button">Back</a>
            <button wire:click="create" type="button" class="btn btn-sm btn-primary shadow float-end mx-1"
                data-bs-toggle="modal" data-bs-target="#createoreditModal">
                Create
            </button>
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
                'name' => 'NAME',
                'type' => 'sortby',
                'sortname' => 'name',
            ])
            @include('helper.tablehelper.tableheader', [
                'name' => 'VIEW/EDIT',
                'type' => 'normal',
                'sortname' => '',
            ])
        </x-slot>

        <x-slot name="tablebody">
            @foreach ($deliverytime as $index => $eachdeliverytime)
                <tr>
                    <td>{{ $deliverytime->firstItem() + $index }}</td>
                    <td>{{ $eachdeliverytime->uniqid }}</td>
                    <td class="text-start">{{ $eachdeliverytime->name }}</td>
                    <td>
                        <button wire:click="show({{ $eachdeliverytime->id }})" class="btn btn-sm btn-success"><i
                                class="bi bi-eye-fill"></i></button>
                        <button wire:click="edit({{ $eachdeliverytime->id }})" class="btn btn-sm btn-primary"><i
                                class="bi bi-pencil-fill"></i></button>
                    </td>
                </tr>
            @endforeach
        </x-slot>

        <x-slot name="tablerecordtotal">
            Showing {{ $deliverytime->firstItem() }} to {{ $deliverytime->lastItem() }} out of
            {{ $deliverytime->total() }} items
        </x-slot>

        <x-slot name="pagination">
            {{ $deliverytime->links() }}
        </x-slot>

    </x-admin.layouts.adminindex>

    <!-- Create or Edit Modal -->
    @include(
        'livewire.admin.settings.mastersetting.deliverytime.createoredit'
    )

    <!-- Show Modal -->
    @include(
        'livewire.admin.settings.mastersetting.deliverytime.show'
    )

</div>
