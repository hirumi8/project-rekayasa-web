<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class AdminProjectPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_page_displays_the_project_form(): void
    {
        $this->get(route('projects.create'))
            ->assertOk()
            ->assertSee('Tambah Project')
            ->assertSee('Nama Project')
            ->assertSee('Teknologi')
            ->assertSee('Pilih Status')
            ->assertSee('Description')
            ->assertSee(route('projects.store'));
    }

    public function test_project_can_be_created_from_admin_form(): void
    {
        $response = $this->post(route('projects.store'), [
            'title' => 'Website Kampus',
            'description' => 'Portal informasi kampus.',
            'teknologi' => 'Laravel',
            'status' => 'active',
        ]);

        $response->assertRedirect(route('projects.index'));
        $this->assertDatabaseHas('projects', [
            'title' => 'Website Kampus',
            'description' => 'Portal informasi kampus.',
            'teknologi' => 'Laravel',
            'status' => 'active',
        ]);
    }

    public function test_project_list_displays_saved_projects(): void
    {
        Project::create([
            'title' => 'Website Kampus',
            'description' => 'Portal informasi kampus.',
            'teknologi' => 'Laravel',
            'status' => 'active',
        ]);

        $this->get(route('projects.index'))
            ->assertOk()
            ->assertSee('Data Projects')
            ->assertSee('Admin Web Profile')
            ->assertSee('Lihat Website')
            ->assertSee('&copy; ' . date('Y') . ' Ivan Hilmi Hersony - 251011701273.', false)
            ->assertSee('Entries per page')
            ->assertSee('Search')
            ->assertSee('Description')
            ->assertSee('Website Kampus');
    }

    public function test_project_list_can_be_searched(): void
    {
        Project::create([
            'title' => 'Website Kampus',
            'description' => 'Portal informasi kampus.',
            'teknologi' => 'Laravel',
            'status' => 'active',
        ]);
        Project::create([
            'title' => 'Aplikasi Inventaris',
            'description' => 'Pengelolaan stok barang.',
            'teknologi' => 'Vue',
            'status' => 'archived',
        ]);

        $this->get(route('projects.index', ['search' => 'Laravel']))
            ->assertOk()
            ->assertSee('Website Kampus')
            ->assertDontSee('Aplikasi Inventaris');
    }

    public function test_project_list_uses_requested_page_size(): void
    {
        foreach (range(1, 11) as $number) {
            Project::create([
                'title' => "Project {$number}",
                'description' => 'Project description.',
                'teknologi' => 'Laravel',
                'status' => 'active',
            ]);
        }

        $this->get(route('projects.index', ['per_page' => 10, 'page' => 2]))
            ->assertOk()
            ->assertViewHas('projects', function (LengthAwarePaginator $projects): bool {
                return $projects->currentPage() === 2
                    && $projects->perPage() === 10
                    && $projects->count() === 1;
            });
    }

    public function test_project_edit_page_displays_the_saved_values(): void
    {
        $project = Project::create([
            'title' => 'Website Kampus',
            'description' => 'Portal informasi kampus.',
            'teknologi' => 'Laravel',
            'status' => 'active',
        ]);

        $this->get(route('projects.edit', $project))
            ->assertOk()
            ->assertSee('Edit Project')
            ->assertSee('value="Website Kampus"', false)
            ->assertSee('Portal informasi kampus.');
    }

    public function test_project_can_be_updated_from_admin_form(): void
    {
        $project = Project::create([
            'title' => 'Website Kampus',
            'description' => 'Portal informasi kampus.',
            'teknologi' => 'Laravel',
            'status' => 'active',
        ]);

        $response = $this->put(route('projects.update', $project), [
            'title' => 'Portal Kampus',
            'description' => 'Portal akademik kampus.',
            'teknologi' => 'Laravel dan Vue',
            'status' => 'archived',
        ]);

        $response->assertRedirect(route('projects.index'));
        $this->assertDatabaseHas('projects', [
            'id' => $project->id,
            'title' => 'Portal Kampus',
            'description' => 'Portal akademik kampus.',
            'teknologi' => 'Laravel dan Vue',
            'status' => 'archived',
        ]);
    }

    public function test_create_project_requires_the_required_fields(): void
    {
        $this->post(route('projects.store'), [])
            ->assertSessionHasErrors(['title', 'description', 'teknologi', 'status']);
    }

    public function test_project_image_can_be_uploaded(): void
    {
        $response = $this->post(route('projects.store'), [
            'title' => 'Website Kampus',
            'description' => 'Portal informasi kampus.',
            'teknologi' => 'Laravel',
            'status' => 'active',
            'image' => UploadedFile::fake()->image('kampus.png'),
        ]);

        $response->assertRedirect(route('projects.index'));

        $project = Project::where('title', 'Website Kampus')->firstOrFail();
        $imagePath = public_path('images/' . $project->image);

        $this->assertFileExists($imagePath);
        $this->assertDatabaseHas('projects', [
            'id' => $project->id,
            'image' => $project->image,
        ]);

        File::delete($imagePath);
    }
}
