<div>
    <x-admin.layouts.adminindex>

        <x-slot name="title">
            ENGINEER
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
            @foreach ($engineer as $index => $eachengineer)
                <tr>
                    <td>{{ $engineer->firstItem() + $index }}</td>
                    <td>{{ $eachengineer->uniqid }}</td>
                    <td>{{ $eachengineer->name }}</td>
                    <td>
                        <button wire:click="show({{ $eachengineer->id }})" class="btn btn-sm btn-success"><i
                                class="bi bi-eye-fill"></i></button>
                        <button wire:click="edit({{ $eachengineer->id }})" class="btn btn-sm btn-primary"><i
                                class="bi bi-pencil-fill"></i></button>
                    </td>
                </tr>
            @endforeach
        </x-slot>

        <x-slot name="tablerecordtotal">
            Showing {{ $engineer->firstItem() }} to {{ $engineer->lastItem() }} out of
            {{ $engineer->total() }} items
        </x-slot>

        <x-slot name="pagination">
            {{ $engineer->links() }}
        </x-slot>

    </x-admin.layouts.adminindex>

    <!-- Create or Edit Modal -->
    @include('livewire.admin.settings.mastersetting.engineer.createoredit')

    <!-- Show Modal -->
    @include('livewire.admin.settings.mastersetting.engineer.show')

</div>
