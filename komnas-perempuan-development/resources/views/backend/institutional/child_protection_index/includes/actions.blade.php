@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.child_protection_index.create'))
    <x-utils.edit-button :href="route('admin.institutional.child_protection_index.edit', $model)" />
@endif

@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.child_protection_index.create'))
    <x-utils.delete-button :href="route('admin.institutional.child_protection_index.destroy', $model)" />
@endif
