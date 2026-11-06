<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('class="dark"', false);
        $response->assertDontSee('Sub-50ms TTFB');
        $response->assertDontSee('Spatial GIS (SRID 4326)');
        $response->assertSee('Login Page');
        $response->assertSee('Landing Page');
        $response->assertSee('CRUD');
        $response->assertSee('Student Offense Monitoring Management System');
        $response->assertSee('SQLite');
        $response->assertSee('sprout.free.nf');
        $response->assertDontSee('jake.free.nf');
        $response->assertDontSee('S.O.M.M.S Executive Dashboard');
        $response->assertDontSee('Student Registration & Automated ID Issuance');
        $response->assertDontSee('Authentication & Access Gateway');
        $response->assertDontSee('Staff Session Verification');
        $response->assertDontSee('Map Atlas');
        $response->assertDontSee('Admin Calendar');
        $response->assertDontSee('Patient Portal');
        $response->assertDontSee('Academic CRUD');
        $response->assertDontSee('marker');
        $response->assertDontSee('November 05');
        $response->assertDontSee('October 11');
        $response->assertDontSee('September 07');
        $response->assertDontSee('September 02');
        $response->assertDontSee('July 23');
    }

    public function test_somms_project_uses_sqlite_and_no_phpmyadmin(): void
    {
        $somms = collect(config('portfolio.projects'))->firstWhere('id', 'somms');
        $this->assertNotNull($somms);
        $this->assertNotContains('phpMyAdmin', $somms['stack']);
        $this->assertContains('SQLite', $somms['stack']);
        foreach ($somms['screenshots'] as $ss) {
            $this->assertEmpty($ss['title']);
        }
    }

    public function test_certifications_only_use_years(): void
    {
        $certs = config('portfolio.certifications');
        foreach ($certs as $cert) {
            $this->assertArrayNotHasKey('date', $cert);
            $this->assertNotEmpty($cert['year']);
        }

        $response = $this->get('/education');
        $response->assertStatus(200);
        $response->assertDontSee('November 05');
        $response->assertDontSee('October 11');
        $response->assertDontSee('September 07');
        $response->assertDontSee('September 02');
        $response->assertDontSee('July 23');
    }
}
