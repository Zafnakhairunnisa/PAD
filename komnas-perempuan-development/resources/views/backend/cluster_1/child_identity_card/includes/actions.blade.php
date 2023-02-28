<x-utils.edit-button
    :href="route('admin.cluster_1.child_identity_card.edit', $model)"
    permission='admin.cluster_1.child_identity_card.create'
/>

<x-utils.link
    class="btn btn-danger btn-sm"
    icon="fas fa-trash"
    :text="__('Hapus')"
    wire:click="deleteConfirm({{ $model->id }})"
    permission='admin.cluster_1.child_identity_card.delete'
/>
