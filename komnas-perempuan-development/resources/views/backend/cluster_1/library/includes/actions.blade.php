<x-utils.edit-button
    :href="route('admin.cluster_1.library.edit', $model)"
    permission='admin.cluster_1.library.create'
/>

<x-utils.link
    class="btn btn-danger btn-sm"
    icon="fas fa-trash"
    :text="__('Hapus')"
    wire:click="deleteConfirm({{ $model->id }})"
/>
