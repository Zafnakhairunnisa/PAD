@if ($logged_in_user->hasAllAccess() ||
    $logged_in_user->can('admin.institutional.child_protection_activity.create'))
    <x-utils.edit-button :href="route('admin.institutional.child_protection_activity.edit', $model)" />
@endif

@if ($logged_in_user->hasAllAccess() ||
    $logged_in_user->can('admin.institutional.child_protection_activity.create'))
    <x-utils.delete-button :href="route('admin.institutional.child_protection_activity.destroy', $model)" />
@endif
