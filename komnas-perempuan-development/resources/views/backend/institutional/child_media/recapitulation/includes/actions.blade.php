<x-utils.edit-button
    :href="route('admin.institutional.child_media.recapitulation.edit', $model)"
    permission="admin.institutional.child_media.recapitulation.craeate"
/>

<x-utils.delete-button
    :href="route('admin.institutional.child_media.recapitulation.destroy', $model)"
    permission="admin.institutional.child_media.recapitulation.create"
/>
