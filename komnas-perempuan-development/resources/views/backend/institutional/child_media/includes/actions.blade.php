<x-utils.edit-button
    :href="route('admin.institutional.child_media.edit', $model)"
    permission='admin.institutional.child_media.create'
/>

<x-utils.delete-button
    :href="route('admin.institutional.child_media.destroy', $model)"
    permission='admin.institutional.child_media.create'
/>
