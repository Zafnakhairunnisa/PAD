<?php

namespace App\Http\Livewire\Backend\Cluster1\BirthCertificate;

use App\Domains\Cluster1\Services\BirthCertificate\BirthCertificateService;
use Livewire\Component;

class BirthCertificateList extends Component
{
    private BirthCertificateService $service;

    protected $listeners = [
        'delete' => 'delete',
    ];

    public function boot(BirthCertificateService $childForumService)
    {
        $this->service = $childForumService;
    }

    public function delete($id)
    {
        if (is_array($id) && count($id)) {
            foreach ($id as $selectedKey) {
                $this->service->deleteById($selectedKey);
            }
        } else {
            $this->service->deleteById($id);
        }

        session()->flash('flash_success', __('Berhasil menghapus kepemilikan akta kelahiran.'));

        return redirect()->route('admin.cluster_1.birth_certificate.index');
    }

    public function render()
    {
        return view('backend.cluster_1.akta_kelahiran.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
