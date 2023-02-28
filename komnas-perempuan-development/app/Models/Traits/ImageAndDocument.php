<?php

namespace App\Models\Traits;

/**
 * Trait ImageAndDocument.
 */
trait ImageAndDocument
{
    public function document(string $slug)
    {
        $documents = $this->service->documents($slug);

        return inertia('Document', [
            'documents' => $documents,
        ]);
    }

    public function image(string $slug)
    {
        $images = $this->service->images($slug);

        return inertia('Photo', [
            'images' => $images,
        ]);
    }
}
