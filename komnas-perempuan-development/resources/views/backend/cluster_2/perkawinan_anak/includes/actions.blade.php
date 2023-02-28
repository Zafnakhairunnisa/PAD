<x-utils.edit-button
    :href="route('admin.cluster_2.perkawinan_anak.edit', $model)"
    permission='admin.cluster_2.perkawinan_anak.create'
/>

<x-utils.link
    class="btn btn-danger btn-sm"
    icon="fas fa-trash"
    :text="__('Hapus')"
    wire:click="deleteConfirm({{ $model->id }})"
/>
