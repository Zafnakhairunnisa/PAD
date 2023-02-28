<x-utils.edit-button
    :href="route('admin.cluster_4.rumah_ibadah_ramah_anak.edit', $model)"
    permission='admin.cluster_4.rumah_ibadah_ramah_anak.create'
/>

<x-utils.link
    class="btn btn-danger btn-sm"
    icon="fas fa-trash"
    :text="__('Hapus')"
    wire:click="deleteConfirm({{ $model->id }})"
    permission='admin.cluster_4.rumah_ibadah_ramah_anak.delete'
/>
