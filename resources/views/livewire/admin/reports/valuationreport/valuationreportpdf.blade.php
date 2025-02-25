<div>
    <div style="text-align:center;">
        <h3>Valuation Report</h3>
    </div>
    <table style="border: 1px solid; border-collapse: collapse; width:100%;">
        <thead>
            <tr>
                <th style="border: 1px solid;">S.NO</th>
                <th style="border: 1px solid;">PROPERTY NAME</th>
                <th style="border: 1px solid;">CUSTOMER NAME</th>
                <th style="border: 1px solid;">CATEGORY</th>
                <th style="border: 1px solid;">LATITUDE</th>
                <th style="border: 1px solid;">LONGITUDE</th>
                <th style="border: 1px solid;">GEO MAP LOCATION</th>
                <th style="border: 1px solid;">THREE WORLD LOCATION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($valuation as $key => $item)
                <tr>
                    <td style="border: 1px solid;text-align:center;">{{ $key + 1 }}</td>
                    <td style="border: 1px solid;text-align:center;">{{ $item->name }}</td>
                    <td style="border: 1px solid;text-align:center;">
                        {{ $item->customer->name }}</td>
                    <td style="border: 1px solid;text-align:center;">{{ $item?->category->name }}</td>
                    <td style="border: 1px solid;text-align:center;">{{ $item?->latitude }}</td>
                    <td style="border: 1px solid;text-align:center;">{{ $item?->longitude }}</td>
                    <td style="border: 1px solid;text-align:center;">{{ $item?->googlemaplocation }}</td>
                    <td style="border: 1px solid;text-align:center;">{{ $item?->threewordlocation }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
