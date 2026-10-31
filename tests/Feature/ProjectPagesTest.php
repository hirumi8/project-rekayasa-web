<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_project_index_displays_projects(): void
    {
        Project::create([
            'title' => 'Example project',
            'description' => 'A sample project description.',
            'teknologi' => 'Laravel',
            'status' => 'active',
        ]);

        $this->get(route('project.index'))
            ->assertOk()
            ->assertSee('Portofolio Project')
            ->assertSee('Example project');
    }

    public function test_project_detail_displays_a_project(): void
    {
        $project = Project::create([
            'title' => 'Example project',
            'description' => 'A sample project description.',
            'teknologi' => 'Laravel',
            'status' => 'active',
        ]);

        $this->get(route('project.show', $project->id))
            ->assertOk()
            ->assertSee('Example project')
            ->assertSee('A sample project description.');
    }
}
