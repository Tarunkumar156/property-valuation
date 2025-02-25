<div>
    <div style="text-align:center;">
        <h3>Customer Report</h3>
    </div>
    <table
        style="border: 1px solid;width: 100%;table-layout: fixed; font-size:10px;border-collapse: collapse; width:100%;">
        <thead>
            <tr>
                <th style="border: 1px solid;width:5%">S.NO</th>
                <th style="border: 1px solid;width:15%">NAME</th>
                <th style="border: 1px solid;width:10%">TYPE</th>
                <th style="border: 1px solid;width:15%">EMAIL</th>
                <th style="border: 1px solid;width:15%">PHONE</th>
                <th style="border: 1px solid;width:25%">ADDRESS</th>
                <th style="border: 1px solid;width:15%">CONTACT PERSON NAME</th>
                <th style="border: 1px solid;width:15%">CONTACT PERSON PHONE</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customer as $key => $item)
                <tr>
                    <td style="border: 1px solid;">{{ $key + 1 }}</td>
                    <td style="border: 1px solid;">{{ $item->name }}</td>
                    <td style="border: 1px solid;">
                        {{ $item->type ? config('archive.customer_type')[$item->type] : '' }}</td>
                    <td style="border: 1px solid;">{{ $item?->email }}</td>
                    <td style="border: 1px solid;">{{ $item?->phone }}</td>
                    <td style="border: 1px solid;">{{ $item?->address }}</td>
                    <td style="border: 1px solid;">{{ $item?->contact_person_name }}</td>
                    <td style="border: 1px solid;">{{ $item?->contact_person_phone }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
