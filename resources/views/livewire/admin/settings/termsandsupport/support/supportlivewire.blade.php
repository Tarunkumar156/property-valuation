<div>
    <x-admin.layouts.adminindex>

        <x-slot name="title">
            SUPPORT
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
                'name' => 'PANEL',
                'type' => 'sortby',
                'sortname' => 'panel',
            ])
            @include('helper.tablehelper.tableheader', [
                'name' => 'TYPE',
                'type' => 'sortby',
                'sortname' => 'type',
            ])
            @include('helper.tablehelper.tableheader', [
                'name' => 'VIEW/EDIT',
                'type' => 'normal',
                'sortname' => '',
            ])
        </x-slot>

        <x-slot name="tablebody">
            @foreach ($support as $index => $eachsupport)
                <tr>
                    <td>{{ $support->firstItem() + $index }}</td>
                    <td>{{ $eachsupport->uniqid }}</td>
                    <td>{{ $eachsupport->panel }}</td>
                    <td>{{ Config('archive.supporttype')[$eachsupport->type] }}</td>
                    <td>
                        <button wire:click="show({{ $eachsupport->id }})" class="btn btn-sm btn-success"><i
                                class="bi bi-eye-fill"></i></button>
                        <button wire:click="edit({{ $eachsupport->id }})" class="btn btn-sm btn-primary"><i
                                class="bi bi-pencil-fill"></i></button>
                    </td>
                </tr>
            @endforeach
        </x-slot>

        <x-slot name="tablerecordtotal">
            Showing {{ $support->firstItem() }} to {{ $support->lastItem() }} out of
            {{ $support->total() }} items
        </x-slot>

        <x-slot name="pagination">
            {{ $support->links() }}
        </x-slot>

    </x-admin.layouts.adminindex>

    <!-- Create or Edit Modal -->
    @include(
        'livewire.admin.settings.termsandsupport.support.createoredit'
    )

    <!-- Show Modal -->
    @include(
        'livewire.admin.settings.termsandsupport.support.show'
    )

</div>
