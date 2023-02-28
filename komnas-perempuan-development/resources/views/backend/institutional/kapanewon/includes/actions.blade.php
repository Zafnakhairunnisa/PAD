<x-utils.edit-button
    :href="route('admin.institutional.kapanewon.edit', $model)"
    permission='admin.institutional.kapanewon.create'
/>

<x-utils.link
    class="btn btn-danger btn-sm"
    icon="fas fa-trash"
    :text="__('Hapus')"
    wire:click="deleteConfirm({{ $model->id }})"
    permission='admin.institutional.kapanewon.delete'
/>
