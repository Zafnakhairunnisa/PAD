<?php

namespace Tests\Feature\Backend\ChildProtectionIndex;

use App\Domains\Institutional\Models\ChildProtectionIndex;
use App\Http\Livewire\Backend\Institutional\ChildProtectionIndex\ChildProtectionIndexCreateForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

/**
 * Class CreateChildProtectionIndexTest.
 */
class CreateChildProtectionIndexTest extends TestCase
{
    use RefreshDatabase;

    private $page = '/admin/institutional/child-protection-indices';

    /** @test */
    public function an_admin_can_access_the_create_child_protection_index_page()
    {
        $this->loginAsAdmin();

        $this->get($this->page.'/create')->assertOk();
    }

    /** @test */
    public function create_child_protection_index_requires_validation()
    {
        $this->loginAsAdmin();

        Livewire::test(ChildProtectionIndexCreateForm::class)
            ->set('category', '')
            ->set('year', '')
            ->set('rank', '')
            ->set('value', '')
            ->call('submit')
            ->assertHasErrors([
                'category' => 'required',
                'year' => 'required',
                'rank' => 'required',
                'value' => 'required',
            ]);
    }

    /** @test */
    public function a_child_protection_index_can_be_created()
    {
        $this->loginAsAdmin();

        Livewire::test(ChildProtectionIndexCreateForm::class)
            ->set('category', 'Nama Kategori')
            ->set('year', '2022')
            ->set('rank', '80')
            ->set('value', '10')
            ->set('location_id', '1')
            ->call('submit')
            ->assertHasNoErrors([
                'category' => 'required',
                'year' => 'required',
                'rank' => 'required',
                'value' => 'required',
                'location_id' => 'required',
            ]);

        $this->assertTrue(ChildProtectionIndex::whereCategory('Nama Kategori')->exists());
    }

    /** @test  */
    public function is_redirected_to_list_page_after_creation()
    {
        $this->loginAsAdmin();

        Livewire::test(ChildProtectionIndexCreateForm::class)
            ->set('category', 'Nama Kategori')
            ->set('year', '2022')
            ->set('rank', '80')
            ->set('value', '10')
            ->set('location_id', '1')
            ->assertHasNoErrors([
                'category' => 'required',
                'year' => 'required',
                'rank' => 'required',
                'value' => 'required',
                'location_id' => 'required',
            ])
            ->call('submit')
            ->assertRedirect($this->page);
    }
}
