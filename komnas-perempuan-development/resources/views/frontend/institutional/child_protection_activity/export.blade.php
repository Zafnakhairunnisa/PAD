@inject('locations', '\App\Models\Location')
<table>
    <thead>
        <tr>
            <th>Nama Lembaga</th>
            <th>Sumber Dana</th>
            <th>Nama Kegiatan</th>
            <th>Jenis Kegiatan</th>
            <th>Sasaran</th>
            <th>Anggaran</th>
            <th>Tahun</th>
            <th>Wilayah</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->company_name }}</td>
                <td>{{ $data->source_of_fund->name ?? '' }}</td>
                <td>{{ $data->activity_name }}</td>
                <td>{{ $data->activity_type->name ?? '' }}</td>
                <td>{{ $data->target }}</td>
                <td>Rp. {{ formatCurrency($data->budget) }}</td>
                <td>{{ $data->year }}</td>
                <td>{{ $data->location->name ?? '' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
