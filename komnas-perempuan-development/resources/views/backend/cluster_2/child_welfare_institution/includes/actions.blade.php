<x-utils.edit-button
    :href="route('admin.cluster_2.child_welfare_institution.edit', $model)"
    permission='admin.cluster_2.child_welfare_institution.create'
/>

<x-utils.link
    class="btn btn-danger btn-sm"
    icon="fas fa-trash"
    :text="__('Hapus')"
    wire:click="deleteConfirm({{ $model->id }})"
/>
