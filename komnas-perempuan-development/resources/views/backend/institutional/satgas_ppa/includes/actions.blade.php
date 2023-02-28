@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.institutional.satgas_ppa.create'))
    <x-utils.edit-button :href="route('admin.institutional.satgas_ppa.edit', $model)" />
@endif

@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.institutional.satgas_ppa.create'))
    <x-utils.delete-button :href="route('admin.institutional.satgas_ppa.destroy', $model)" />
@endif
