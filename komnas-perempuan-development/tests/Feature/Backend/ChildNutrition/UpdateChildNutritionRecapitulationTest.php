<?php

namespace Tests\Feature\Backend\ChildNutritionRecapitulation;

use App\Domains\Cluster3\Models\ChildNutrition\ChildNutritionRecapitulation;
use App\Http\Livewire\Backend\Cluster3\ChildNutrition\Recapitulation\ChildNutritionRecapitulationUpdateForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

/**
 * Class UpdateChildNutritionRecapitulationTest.
 */
class UpdateChildNutritionRecapitulationTest extends TestCase
{
    use RefreshDatabase;

    private $page = '/admin/klaster-3/status-gizi-anak/rekapitulasi';

    /** @test */
    public function the_year_is_required()
    {
        $this->loginAsAdmin();

        $recapitulation = ChildNutritionRecapitulation::factory()->create();
        Livewire::test(ChildNutritionRecapitulationUpdateForm::class, [
            'recapitulation' => $recapitulation,
        ])
            ->set('year', '')
            ->call('submit')
            ->assertHasErrors([
                'year' => 'required',
            ]);
    }

    /** @test */
    public function the_value_is_required()
    {
        $this->loginAsAdmin();

        $recapitulation = ChildNutritionRecapitulation::factory()->create();
        Livewire::test(ChildNutritionRecapitulationUpdateForm::class, [
            'recapitulation' => $recapitulation,
        ])
            ->set('value', '')
            ->call('submit')
            ->assertHasErrors([
                'value' => 'required',
            ]);
    }

    /** @test */
    public function the_location_is_required()
    {
        $this->loginAsAdmin();

        $recapitulation = ChildNutritionRecapitulation::factory()->create();
        Livewire::test(ChildNutritionRecapitulationUpdateForm::class, [
            'recapitulation' => $recapitulation,
        ])
            ->set('location_id', '')
            ->call('submit')
            ->assertHasErrors([
                'location_id' => 'required',
            ]);
    }

    /** @test */
    public function a_child_nutrition_value_can_be_updated()
    {
        $this->loginAsAdmin();

        $recapitulation = ChildNutritionRecapitulation::factory()->create();

        Livewire::test(ChildNutritionRecapitulationUpdateForm::class, [
            'recapitulation' => $recapitulation,
        ])
            ->set('value', '5000')
            ->call('submit')
            ->assertHasNoErrors([
                'year' => 'required',
                'value' => 'required',
                'location_id' => 'required',
            ]);

        $this->assertTrue(ChildNutritionRecapitulation::whereValue('5000')->exists());
    }

    /** @test */
    public function an_child_nutrition_year_can_be_updated()
    {
        $this->loginAsAdmin();

        $recapitulation = ChildNutritionRecapitulation::factory()->create();

        Livewire::test(ChildNutritionRecapitulationUpdateForm::class, [
            'recapitulation' => $recapitulation,
        ])
            ->set('year', '2022')
            ->call('submit')
            ->assertHasNoErrors([
                'year' => 'required',
                'value' => 'required',
                'location_id' => 'required',
            ]);

        $this->assertTrue(ChildNutritionRecapitulation::where('year', '=', '2022')->exists());
    }

    /** @test  */
    public function is_redirected_to_list_page_after_updated()
    {
        $this->loginAsAdmin();

        $recapitulation = ChildNutritionRecapitulation::factory()->create();

        Livewire::test(ChildNutritionRecapitulationUpdateForm::class, [
            'recapitulation' => $recapitulation,
        ])
            ->set('year', '2022')
            ->assertHasNoErrors([
                'year' => 'required',
            ])
            ->call('submit')
            ->assertRedirect($this->page);
    }
}
