<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LaporanAuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Semua halaman LaporBanjir hanya boleh diakses setelah login.
     */
    public function test_guest_cannot_access_laporan_pages(): void
    {
        $this->get(route('dashboard'))->assertRedirect(route('login'));
        $this->get(route('laporan.daftar'))->assertRedirect(route('login'));
        $this->get(route('laporan.form'))->assertRedirect(route('login'));
        $this->get(route('laporan.konfirmasi'))->assertRedirect(route('login'));
        $this->get(route('profile.edit'))->assertRedirect(route('login'));
    }

    /**
     * User yang sudah login dapat membuka dashboard dan halaman laporan.
     */
    public function test_authenticated_user_can_access_laporan_pages(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get(route('dashboard'))->assertOk();
        $this->actingAs($user)->get(route('laporan.daftar'))->assertOk();
        $this->actingAs($user)->get(route('laporan.form'))->assertOk();
        $this->actingAs($user)->get(route('laporan.konfirmasi'))->assertOk();
    }

    /**
     * User yang sudah login diarahkan ke dashboard saat membuka halaman awal.
     */
    public function test_authenticated_user_is_redirected_to_dashboard_from_home(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/')
            ->assertRedirect(route('dashboard'));
    }
}
