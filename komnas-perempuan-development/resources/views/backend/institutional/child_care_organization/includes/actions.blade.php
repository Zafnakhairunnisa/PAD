<x-utils.edit-button
    :href="route('admin.institutional.child_care_organization.edit', $model)"
    permission='admin.institutional.child_care_organization.create'
/>

<x-utils.delete-button
    :href="route('admin.institutional.child_care_organization.destroy', $model)"
    permission='admin.institutional.child_care_organization.create'
/>
