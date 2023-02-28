@inject('locations', '\App\Models\Location')
<table>
    <thead>
        <tr>
            <th>Nama Kategori</th>
            <th>Tahun</th>
            <th>Nilai</th>
            <th>Rangking</th>
            <th>Wilayah</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->category }}</td>
                <td>{{ $data->year }}</td>
                <td>{{ $data->value }}</td>
                <td>{{ $data->rank }}</td>
                <td>{{ $data->location->name ?? '' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
