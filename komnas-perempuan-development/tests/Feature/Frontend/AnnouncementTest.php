<?php

namespace Tests\Feature\Frontend;

use App\Domains\Announcement\Models\Announcement;
use Tests\TestCase;

/**
 * Class AnnouncementTest.
 */
class AnnouncementTest extends TestCase
{
    /** @test */
    public function a_disabled_announcement_does_not_show()
    {
        $announcement = Announcement::factory()->disabled()->global()->noDates()->create();

        $response = $this->get('login');

        $response->assertDontSee($announcement->message);
    }

    /** @test */
    public function an_announcement_outside_of_date_range_doesnt_show()
    {
        $announcement = Announcement::factory()->enabled()->global()->outsideDateRange()->create();

        $response = $this->get('login');

        $response->assertDontSee($announcement->message);
    }
}
