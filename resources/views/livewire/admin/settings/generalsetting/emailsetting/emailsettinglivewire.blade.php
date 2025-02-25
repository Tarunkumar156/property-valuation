<div>
    <x-admin.layouts.adminindex>

        <x-slot name="title">
            EMAIL SETTINGS
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
                'name' => 'PROVIDER NAME',
                'type' => 'sortby',
                'sortname' => 'provider_name',
            ])
            @include('helper.tablehelper.tableheader', [
                'name' => 'EMAIL NAME',
                'type' => 'sortby',
                'sortname' => 'email_from_name',
            ])
            @include('helper.tablehelper.tableheader', [
                'name' => 'EMAIL',
                'type' => 'sortby',
                'sortname' => 'email_from_mail',
            ])
            @include('helper.tablehelper.tableheader', [
                'name' => 'USERNAME',
                'type' => 'sortby',
                'sortname' => 'email_mail_username',
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
            @foreach ($emailsetting as $index => $eachemailsetting)
                <tr>
                    <td>{{ $emailsetting->firstItem() + $index }}</td>
                    <td class="text-start">{{ $eachemailsetting->uniqid }}</td>
                    <td class="text-start">{{ $eachemailsetting->provider_name }}</td>
                    <td class="text-start">{{ $eachemailsetting->email_from_name }}</td>
                    <td class="text-start">{{ $eachemailsetting->email_from_mail }}</td>
                    <td class="text-start">{{ $eachemailsetting->email_mail_username }}</td>
                    <td>{!! $eachemailsetting->is_default ? '<span class="badge bg-success fs-6">Yes</span>' : '<span class="badge bg-danger fs-6">No</span>' !!}
                    <td>
                        <button wire:click="show({{ $eachemailsetting->id }})" class="btn btn-sm btn-success"><i
                                class="bi bi-eye-fill"></i></button>
                        <button wire:click="edit({{ $eachemailsetting->id }})" class="btn btn-sm btn-primary"><i
                                class="bi bi-pencil-fill"></i></button>
                    </td>
                </tr>
            @endforeach
        </x-slot>

        <x-slot name="tablerecordtotal">
            Showing {{ $emailsetting->firstItem() }} to {{ $emailsetting->lastItem() }} out of
            {{ $emailsetting->total() }} items
        </x-slot>

        <x-slot name="pagination">
            {{ $emailsetting->links() }}
        </x-slot>

    </x-admin.layouts.adminindex>

    <!-- Create or Edit Modal -->
    @include(
        'livewire.admin.settings.generalsetting.emailsetting.createoredit'
    )

    <!-- Show Modal -->
    @include(
        'livewire.admin.settings.generalsetting.emailsetting.show'
    )

</div>
