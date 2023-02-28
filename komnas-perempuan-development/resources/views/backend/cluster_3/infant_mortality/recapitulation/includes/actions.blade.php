<x-utils.edit-button
    :href="route('admin.cluster_3.infant_mortality.recapitulation.edit', $model)"
    permission='admin.cluster_3.infant_mortality.recapitulation.create'
/>

<x-utils.link
    class="btn btn-danger btn-sm"
    icon="fas fa-trash"
    :text="__('Hapus')"
    wire:click="deleteConfirm({{ $model->id }})"
    permission='admin.cluster_3.infant_mortality.recapitulation.delete'
/>
