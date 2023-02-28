<x-utils.edit-button
    :href="route('admin.cluster_1.birth_certificate.edit', $model)"
    permission='admin.cluster_1.birth_certificate.create'
/>

<x-utils.link
    class="btn btn-danger btn-sm"
    icon="fas fa-trash"
    :text="__('Hapus')"
    wire:click="deleteConfirm({{ $model->id }})"
/>
