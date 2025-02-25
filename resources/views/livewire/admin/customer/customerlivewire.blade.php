<div>
    <x-admin.layouts.adminindex>

        <x-slot name="title">
            CUSTOMER
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
                'name' => 'NAME',
                'type' => 'sortby',
                'sortname' => 'name',
            ])
            @include('helper.tablehelper.tableheader', [
                'name' => 'PHONE',
                'type' => 'sortby',
                'sortname' => 'phone',
            ])
            @include('helper.tablehelper.tableheader', [
                'name' => 'CUSTOMER TYPE',
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
            @foreach ($customer as $index => $eachcustomer)
                <tr>
                    <td>{{ $customer->firstItem() + $index }}</td>
                    <td>{{ $eachcustomer->uniqid }}</td>
                    <td>{{ $eachcustomer->name }}</td>
                    <td>{{ $eachcustomer->phone }}</td>
                    <td>{{ config('archive.customer_type')[$eachcustomer->type] }}</td>
                    <td>
                        <button wire:click="show({{ $eachcustomer->id }})" class="btn btn-sm btn-success"><i
                                class="bi bi-eye-fill"></i></button>
                        <button wire:click="edit({{ $eachcustomer->id }})" class="btn btn-sm btn-primary"><i
                                class="bi bi-pencil-fill"></i></button>
                    </td>
                </tr>
            @endforeach
        </x-slot>

        <x-slot name="tablerecordtotal">
            Showing {{ $customer->firstItem() }} to {{ $customer->lastItem() }} out of
            {{ $customer->total() }} items
        </x-slot>

        <x-slot name="pagination">
            {{ $customer->links() }}
        </x-slot>

    </x-admin.layouts.adminindex>

    <!-- Create or Edit Modal -->
    @include('livewire.admin.customer.createoredit')

    <!-- Show Modal -->
    @include('livewire.admin.customer.show')

</div>
