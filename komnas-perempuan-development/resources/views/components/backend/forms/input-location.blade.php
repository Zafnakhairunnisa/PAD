@inject('location', '\App\Models\Location')
<select
    name="location_id"
    class="form-control @error('location_id') is-invalid @enderror"
>
    <option
        hidden
        value=''
    >{{ __('Pilih Wilayah') }}</option>
    @foreach ($location->get() as $location)
        <option
            @if ((string) $location->id === old('location_id', $data ?? '')) selected @endif
            value="{{ $location->id }}"
        >@lang($location->name)</option>
    @endforeach
</select>
@error('location_id')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
