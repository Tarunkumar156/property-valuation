<div>
    <x-admin.layouts.adminindex>

        <x-slot name="title">
            SMS SETTINGS
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
                'name' => 'PROVIDER NAME',
                'type' => 'sortby',
                'sortname' => 'provider_name',
            ])
            @include('helper.tablehelper.tableheader', [
                'name' => 'SENDER ID',
                'type' => 'sortby',
                'sortname' => 'sender_id',
            ])
            @include('helper.tablehelper.tableheader', [
                'name' => 'COUNTRY CODE',
                'type' => 'sortby',
                'sortname' => 'country_code',
            ])
            @include('helper.tablehelper.tableheader', [
                'name' => 'PHONE NO',
                'type' => 'sortby',
                'sortname' => 'phone_no',
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
            @foreach ($smssetting as $index => $eachsmssetting)
                <tr>
                    <td>{{ $smssetting->firstItem() + $index }}</td>
                    <td class="text-start">{{ $eachsmssetting->uniqid }}</td>
                    <td class="text-start">{{ $eachsmssetting->provider_name }}</td>
                    <td class="text-start">{{ $eachsmssetting->sender_id }}</td>
                    <td class="text-start">{{ $eachsmssetting->country_code }}</td>
                    <td class="text-start">{{ $eachsmssetting->phone_no }}</td>
                    <td>{!! $eachsmssetting->is_default ? '<span class="badge bg-success fs-6">Yes</span>' : '<span class="badge bg-danger fs-6">No</span>' !!}
                    <td>
                        <button wire:click="show({{ $eachsmssetting->id }})" class="btn btn-sm btn-success"><i
                                class="bi bi-eye-fill"></i></button>
                        <button wire:click="edit({{ $eachsmssetting->id }})" class="btn btn-sm btn-primary"><i
                                class="bi bi-pencil-fill"></i></button>
                    </td>
                </tr>
            @endforeach
        </x-slot>

        <x-slot name="tablerecordtotal">
            Showing {{ $smssetting->firstItem() }} to {{ $smssetting->lastItem() }} out of
            {{ $smssetting->total() }} items
        </x-slot>

        <x-slot name="pagination">
            {{ $smssetting->links() }}
        </x-slot>

    </x-admin.layouts.adminindex>

    <!-- Create or Edit Modal -->
    @include(
        'livewire.admin.settings.generalsetting.smssetting.createoredit'
    )

    <!-- Show Modal -->
    @include(
        'livewire.admin.settings.generalsetting.smssetting.show'
    )

</div>
