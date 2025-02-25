<div>
    <x-admin.layouts.adminindex>

        <x-slot name="title">
            CATEGORY
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
            @foreach ($category as $index => $eachcategory)
                <tr>
                    <td>{{ $category->firstItem() + $index }}</td>
                    <td>{{ $eachcategory->uniqid }}</td>
                    <td>{{ $eachcategory->name }}</td>
                    <td>
                        <button wire:click="show({{ $eachcategory->id }})" class="btn btn-sm btn-success"><i
                                class="bi bi-eye-fill"></i></button>
                        <button wire:click="edit({{ $eachcategory->id }})" class="btn btn-sm btn-primary"><i
                                class="bi bi-pencil-fill"></i></button>
                    </td>
                </tr>
            @endforeach
        </x-slot>

        <x-slot name="tablerecordtotal">
            Showing {{ $category->firstItem() }} to {{ $category->lastItem() }} out of
            {{ $category->total() }} items
        </x-slot>

        <x-slot name="pagination">
            {{ $category->links() }}
        </x-slot>

    </x-admin.layouts.adminindex>

    <!-- Create or Edit Modal -->
    @include(
        'livewire.admin.settings.mastersetting.category.createoredit'
    )

    <!-- Show Modal -->
    @include(
        'livewire.admin.settings.mastersetting.category.show'
    )

</div>
