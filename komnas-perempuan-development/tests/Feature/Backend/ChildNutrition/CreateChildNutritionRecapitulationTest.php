<?php

namespace Tests\Feature\Backend\ChildNutritionRecapitulation;

use App\Domains\Cluster3\Models\ChildNutrition\ChildNutritionRecapitulation;
use App\Http\Livewire\Backend\Cluster3\ChildNutrition\Recapitulation\ChildNutritionRecapitulationCreateForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

/**
 * Class CreateChildNutritionRecapitulationTest.
 */
class CreateChildNutritionRecapitulationTest extends TestCase
{
    use RefreshDatabase;

    private $page = '/admin/klaster-3/status-gizi-anak/rekapitulasi';

    /** @test */
    public function an_admin_can_access_the_create_child_nutrition_page()
    {
        $this->loginAsAdmin();

        $this->get($this->page.'/create')->assertOk();
    }

    /** @test */
    public function create_child_nutrition_requires_validation()
    {
        $this->loginAsAdmin();

        Livewire::test(ChildNutritionRecapitulationCreateForm::class)
            ->set('value', '')
            ->set('year', '')
            ->set('location_id', '')
            ->call('submit')
            ->assertHasErrors([
                'year' => 'required',
                'value' => 'required',
                'location_id' => 'required',
            ]);
    }

    /** @test */
    public function create_child_nutrition_location_should_only_from_selection()
    {
        $this->loginAsAdmin();

        Livewire::test(ChildNutritionRecapitulationCreateForm::class)
            ->set('location_id', '10')
            ->call('submit')
            ->assertHasErrors([
                'location_id' => 'exists',
            ]);
    }

    /** @test */
    public function a_child_nutrition_can_be_created()
    {
        $this->loginAsAdmin();

        Livewire::test(ChildNutritionRecapitulationCreateForm::class)
            ->set('year', '2022')
            ->set('value', '10')
            ->set('location_id', '1')
            ->set('category_id', '1')
            ->call('submit')
            ->assertHasNoErrors([
                'year' => 'required',
                'value' => 'required',
                'location_id' => 'required',
                'category_id' => 'required',
            ]);

        $this->assertTrue(ChildNutritionRecapitulation::whereLocationId('1')->exists());
    }

    /** @test  */
    public function is_redirected_to_list_page_after_creation()
    {
        $this->loginAsAdmin();

        Livewire::test(ChildNutritionRecapitulationCreateForm::class)
            ->set('year', '2022')
            ->set('value', '10')
            ->set('location_id', '1')
            ->set('category_id', '1')
            ->call('submit')
            ->assertRedirect($this->page);
    }
}
