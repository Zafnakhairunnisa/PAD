@inject('locations', '\App\Models\Location')
<table>
    <thead>
        <tr>
            <th
                rowspan="2"
                style="text-align: center"
            >Wilayah</th>
            @foreach ($years as $year)
                <th
                    style="text-align: center; font-weight: bold"
                    colspan="{{ count(config('constants.recapitulation_category')) }}"
                >{{ $year }}</th>
            @endforeach
        </tr>
        <tr>
            @foreach ($years as $year)
                @foreach (config('constants.recapitulation_category') as $category)
                    <th style="text-align: center; font-weight: bold">{{ $category }}</th>
                @endforeach
            @endforeach
        </tr>
    </thead>

    <tbody>
        @foreach ($locations->where('name', '!=', 'Daerah Istimewa Yogyakarta')->get() as $location)
            <tr>
                <td style="text-align: center; font-weight: bold">{{ $location->name }}</td>
                @foreach ($years as $year)
                    @foreach (config('constants.recapitulation_category') as $category)
                        @forelse ($recapitulations
                            ->where('year', '=', $year)
                            ->where('category', '=', $category)
                            ->where('location_id', '=', $location->id) as $recap)
                            <td>{{ $recap->value }}</td>
                        @empty
                            <td>0</td>
                        @endforelse
                    @endforeach
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
