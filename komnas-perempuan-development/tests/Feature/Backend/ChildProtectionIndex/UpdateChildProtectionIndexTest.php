<?php

namespace Tests\Feature\Backend\ChildProtectionIndex;

use App\Domains\Institutional\Models\ChildProtectionIndex;
use App\Http\Livewire\Backend\Institutional\ChildProtectionIndex\ChildProtectionIndexUpdateForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

/**
 * Class UpdateChildProtectionIndexTest.
 */
class UpdateChildProtectionIndexTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_category_is_required()
    {
        $this->loginAsAdmin();

        Livewire::test(ChildProtectionIndexUpdateForm::class)
            ->set('category', '')
            ->call('submit')
            ->assertHasErrors([
                'category' => 'required',
            ]);
    }

    /** @test */
    public function the_year_is_required()
    {
        $this->loginAsAdmin();

        Livewire::test(ChildProtectionIndexUpdateForm::class)
            ->set('year', '')
            ->call('submit')
            ->assertHasErrors([
                'year' => 'required',
            ]);
    }

    /** @test */
    public function the_location_is_required()
    {
        $this->loginAsAdmin();

        Livewire::test(ChildProtectionIndexUpdateForm::class)
            ->set('location_id', '')
            ->call('submit')
            ->assertHasErrors([
                'location_id' => 'required',
            ]);
    }

    // /** @test */
    // public function can_set_initial_values()
    // {
    //     Livewire::test(ChildProtectionIndexUpdateForm::class, [
    //             'initialCategory' => 'Nama Kategori',
    //             'initialYear' => '2021',
    //             'initialRank' => '20',
    //             'initialValue' => '21',
    //             'initialLocationId' => '1'
    //         ])
    //         ->assertSet('category', 'Nama Kategori');
    // }

    /** @test */
    public function a_child_protection_index_category_can_be_updated()
    {
        $this->loginAsAdmin();

        $childProtectionIndex = ChildProtectionIndex::factory()->create();
        Livewire::test(ChildProtectionIndexUpdateForm::class, [
            'childProtectionIndex' => $childProtectionIndex,
        ])
            ->assertSet('category', $childProtectionIndex->category)
            ->assertSet('year', $childProtectionIndex->year)
            ->assertSet('value', $childProtectionIndex->value)
            ->assertSet('rank', $childProtectionIndex->rank)
            ->set('category', 'Nama Kategori Updated')
            ->call('submit')
            ->assertHasNoErrors([
                'category' => 'required',
                'year' => 'required',
                'rank' => 'required',
                'value' => 'required',
                'location_id' => 'required',
            ]);

        $this->assertTrue(ChildProtectionIndex::whereCategory('Nama Kategori Updated')->exists());
    }
}
