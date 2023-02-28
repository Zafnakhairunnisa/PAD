<x-utils.edit-button
    :href="route('admin.institutional.child_care_organization.recapitulation.edit', $model)"
    permission="admin.institutional.child_care_organization.recapitulation.craeate"
/>

<x-utils.delete-button
    :href="route('admin.institutional.child_care_organization.recapitulation.destroy', $model)"
    permission="admin.institutional.child_care_organization.recapitulation.create"
/>
