<x-utils.edit-button
    :href="route('admin.institutional.child_forum.recapitulation.edit', $model)"
    permission="admin.institutional.child_forum.recapitulation.craeate"
/>

<x-utils.delete-button
    :href="route('admin.institutional.child_forum.recapitulation.destroy', $model)"
    permission="admin.institutional.child_forum.recapitulation.create"
/>
