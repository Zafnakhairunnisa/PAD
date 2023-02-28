@if ($logged_in_user->hasAllAccess() ||
    $logged_in_user->can('admin.child_protection_activity.source_of_funds.create'))
    <x-utils.edit-button :href="route('admin.institutional.child_protection_activity.source_of_funds.edit', $model)" />
@endif

@if ($logged_in_user->hasAllAccess() ||
    $logged_in_user->can('admin.child_protection_activity.source_of_funds.create'))
    <x-utils.delete-button :href="route('admin.institutional.child_protection_activity.source_of_funds.destroy', $model)" />
@endif
