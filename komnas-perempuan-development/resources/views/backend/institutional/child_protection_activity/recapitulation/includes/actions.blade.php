@if ($logged_in_user->hasAllAccess() ||
    $logged_in_user->can('admin.institutional.child_protection_activity.recapitulation.create'))
    <x-utils.edit-button :href="route('admin.institutional.child_protection_activity.recapitulation.edit', $model)" />
@endif

@if ($logged_in_user->hasAllAccess() ||
    $logged_in_user->can('admin.institutional.child_protection_activity.recapitulation.create'))
    <x-utils.delete-button :href="route('admin.institutional.child_protection_activity.recapitulation.destroy', $model)" />
@endif
