<div>
    <x-admin.layouts.adminindex>

        <x-slot name="title">
            PROPERTY VALUATION
        </x-slot>

        <x-slot name="action">
            {{-- <a class="btn btn-sm btn-secondary shadow float-end mx-1" href="{{ route('settings') }}"
                role="button">Back</a> --}}
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
                'name' => 'PROPERTY NAME',
                'type' => 'sortby',
                'sortname' => 'name',
            ])
            @include('helper.tablehelper.tableheader', [
                'name' => 'CUSTOMER NAME',
                'type' => 'normal',
                'sortname' => '',
            ])
            @include('helper.tablehelper.tableheader', [
                'name' => 'CATEGORY',
                'type' => 'normal',
                'sortname' => '',
            ])
            @include('helper.tablehelper.tableheader', [
                'name' => 'VIEW/EDIT',
                'type' => 'normal',
                'sortname' => '',
            ])
            @include('helper.tablehelper.tableheader', [
                'name' => 'VALUATION PROCESS',
                'type' => 'normal',
                'sortname' => '',
            ])
        </x-slot>

        <x-slot name="tablebody">
            @foreach ($valuation as $index => $eachvaluation)
                <tr>
                    <td>{{ $valuation->firstItem() + $index }}</td>
                    <td>{{ $eachvaluation->uniqid }}</td>
                    <td>{{ $eachvaluation->name }}</td>
                    <td>{{ $eachvaluation->customer->name }}</td>
                    <td>{{ $eachvaluation->category->name }}</td>
                    <td>
                        <button wire:click="show({{ $eachvaluation->id }})" class="btn btn-sm btn-success"><i
                                class="bi bi-eye-fill"></i></button>
                        <button wire:click="edit({{ $eachvaluation->id }})" class="btn btn-sm btn-primary"><i
                                class="bi bi-pencil-fill"></i></button>
                    </td>
                    <td>
                        <a href="{{ route('valuationprocess', ['id' => $eachvaluation->id]) }}"
                            class="btn btn-sm btn-success"><i class="bi bi-files"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>

        <x-slot name="tablerecordtotal">
            Showing {{ $valuation->firstItem() }} to {{ $valuation->lastItem() }} out of
            {{ $valuation->total() }} items
        </x-slot>

        <x-slot name="pagination">
            {{ $valuation->links() }}
        </x-slot>

    </x-admin.layouts.adminindex>

    <!-- Create or Edit Modal -->
    @include('livewire.admin.valuation.valuation.createoredit')

    <!-- Show Modal -->
    @include('livewire.admin.valuation.valuation.show')

</div>
