<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProfileNavbarTest extends TestCase
{
    public function test_profile_page_displays_the_public_navigation_links(): void
    {
        $this->get(route('profile'))
            ->assertOk()
            ->assertSee(route('home'))
            ->assertSee(route('profile'))
            ->assertSee(route('project.index'))
            ->assertSee(route('about'))
            ->assertSee(asset('img/Screenshot 2026-09-19 150800.png'));
    }
}
