@inject('locations', '\App\Models\Location')
<table>
    <thead>
        <tr>
            <th>Nama Peraturan</th>
            <th>Tahun</th>
            <th>Jenis Peraturan/Kebijakan</th>
            <th>Macam Peraturan/Kebijakan</th>
            <th>Wilayah</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($regulations as $regulation)
            <tr>
                <td>{{ $regulation->name }}</td>
                <td>{{ $regulation->year }}</td>
                <td>{{ $regulation->rule_type }}</td>
                <td>{{ $regulation->type }}</td>
                <td>{{ $regulation->location->name ?? '' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
