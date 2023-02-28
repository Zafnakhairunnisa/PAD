@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.institutional.child_forum.create'))
    <x-utils.edit-button :href="route('admin.institutional.child_forum.edit', $model)" />
@endif

@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.institutional.child_forum.create'))
    <x-utils.delete-button :href="route('admin.institutional.child_forum.destroy', $model)" />
@endif
