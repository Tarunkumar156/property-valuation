<div>
    <x-admin.layouts.adminindex>

        <x-slot name="title">
            OTP HISTORY
        </x-slot>

        <x-slot name="action">
            <a class="btn btn-sm btn-secondary shadow float-end mx-1" href="{{ route('settings') }}"
                role="button">Back</a>
        </x-slot>

        <x-slot name="tableheader">
            @include('helper.tablehelper.tableheader', [
                'name' => 'S.NO',
                'type' => 'sortby',
                'sortname' => 'created_at',
            ])
            @include('helper.tablehelper.tableheader', [
                'name' => 'PANEL',
                'type' => 'normal',
                'sortname' => '',
            ])
            @include('helper.tablehelper.tableheader', [
                'name' => 'PHONE',
                'type' => 'normal',
                'sortname' => '',
            ])
            @include('helper.tablehelper.tableheader', [
                'name' => 'OTP',
                'type' => 'normal',
                'sortname' => '',
            ])
            @include('helper.tablehelper.tableheader', [
                'name' => 'DETAILS',
                'type' => 'sortby',
                'sortname' => 'details',
            ])
            @include('helper.tablehelper.tableheader', [
                'name' => 'CREATED AT ',
                'type' => 'sortby',
                'sortname' => 'created_at',
            ])

        </x-slot>

        <x-slot name="tablebody">
            @foreach ($otphistory as $index => $eachotphistory)
                <tr>
                    <td>{{ $otphistory->firstItem() + $index }}</td>
                    <td> {{ $eachotphistory->panel }}</td>
                    <td>{{ $eachotphistory->phone }}</td>
                    <td>{{ $eachotphistory->otp }} </td>
                    <td>{{ $eachotphistory->details }} </td>
                    <td>{{ $eachotphistory->created_at->format('d-M-Y h:i') }}</td>
                </tr>
            @endforeach
        </x-slot>

        <x-slot name="tablerecordtotal">
            Showing {{ $otphistory->firstItem() }} to {{ $otphistory->lastItem() }} out of
            {{ $otphistory->total() }}
            items
        </x-slot>

        <x-slot name="pagination">
            {{ $otphistory->links() }}
        </x-slot>

    </x-admin.layouts.adminindex>

</div>
