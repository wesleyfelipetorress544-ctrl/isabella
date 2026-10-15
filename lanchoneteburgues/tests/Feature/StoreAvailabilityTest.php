<?php

use App\Models\StoreSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('starts open and allows an administrator to close and reopen the store', function () {
    $administrator = User::factory()->create(['is_admin' => true]);

    $this->get(route('home'))->assertOk();
    $this->actingAs($administrator)
        ->get(route('admin'))
        ->assertOk()
        ->assertSee('Loja aberta');

    $this->post(route('admin.store-status.update'), ['is_open' => '0'])
        ->assertRedirect(route('admin'))
        ->assertSessionHas('store_status', 'Loja fechada com sucesso.');

    $this->assertDatabaseHas('store_settings', [
        'id' => 1,
        'is_open' => false,
    ]);

    $this->get(route('home'))
        ->assertStatus(503)
        ->assertViewIs('store-closed')
        ->assertSee('Estamos fechados no momento!');

    $this->get(route('admin'))
        ->assertOk()
        ->assertSee('Loja fechada');

    $this->post(route('admin.store-status.update'), ['is_open' => '1'])
        ->assertRedirect(route('admin'))
        ->assertSessionHas('store_status', 'Loja aberta com sucesso.');

    $this->assertDatabaseHas('store_settings', [
        'id' => 1,
        'is_open' => true,
    ]);

    $this->get(route('home'))->assertOk();
});

it('blocks public cart and checkout requests while keeping administration accessible', function () {
    $administrator = User::factory()->create(['is_admin' => true]);
    StoreSetting::query()->findOrFail(1)->update(['is_open' => false]);

    $this->get(route('bebidas'))
        ->assertStatus(503)
        ->assertViewIs('store-closed')
        ->assertSee('Estamos fechados no momento!')
        ->assertDontSee('<button', false);

    $this->postJson(route('cart.items.store'), [
        'product_id' => 1,
        'quantity' => 1,
    ])
        ->assertStatus(503)
        ->assertExactJson(['message' => 'Estamos fechados no momento!']);

    $this->postJson(route('cart.checkout'), [])
        ->assertStatus(503)
        ->assertExactJson(['message' => 'Estamos fechados no momento!']);

    $this->assertDatabaseCount('orders', 0);

    $this->get(route('login'))->assertOk();
    $this->actingAs($administrator)->get(route('admin'))->assertOk();
});

it('forbids non-administrators from changing the store status', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->post(route('admin.store-status.update'), ['is_open' => '0'])
        ->assertForbidden();

    $this->assertDatabaseHas('store_settings', [
        'id' => 1,
        'is_open' => true,
    ]);
});

it('rejects invalid store status values without changing the current status', function () {
    $administrator = User::factory()->create(['is_admin' => true]);

    $this->actingAs($administrator)
        ->from(route('admin'))
        ->post(route('admin.store-status.update'), ['is_open' => 'closed'])
        ->assertRedirect(route('admin'))
        ->assertSessionHasErrors('is_open');

    $this->assertDatabaseHas('store_settings', [
        'id' => 1,
        'is_open' => true,
    ]);
});
