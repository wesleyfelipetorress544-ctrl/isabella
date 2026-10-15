<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

it('redirects guests from the admin dashboard to the login page', function () {
    $this->get(route('admin'))
        ->assertRedirect(route('login'));
});

it('shows the admin login page', function () {
    $this->get(route('login'))
        ->assertOk()
        ->assertSee('Painel administrativo');
});

it('creates the first administrator through the console command', function () {
    $this->artisan('admin:create')
        ->expectsQuestion('Nome do administrador', 'Ana Administradora')
        ->expectsQuestion('E-mail', 'ana@example.com')
        ->expectsQuestion('Senha (mínimo 12 caracteres)', 'senha-super-segura')
        ->expectsQuestion('Confirme a senha', 'senha-super-segura')
        ->expectsOutput('Administrador criado com sucesso.')
        ->assertExitCode(0);

    $administrator = User::query()->where('email', 'ana@example.com')->firstOrFail();

    expect($administrator->is_admin)->toBeTrue()
        ->and(Hash::check('senha-super-segura', $administrator->password))->toBeTrue();
});

it('refuses admin access to authenticated non-admin users', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('admin'))
        ->assertForbidden();

    $this->actingAs($user)
        ->post(route('admin.products.store'), [])
        ->assertForbidden();

    $this->assertDatabaseCount('products', 0);
});

it('allows an administrator to sign in', function () {
    $administrator = User::factory()->create([
        'email' => 'admin@example.com',
        'password' => 'admin-password',
        'is_admin' => true,
    ]);

    $this->post(route('admin.login.store'), [
        'email' => 'admin@example.com',
        'password' => 'admin-password',
    ])->assertRedirect(route('admin'));

    $this->assertAuthenticatedAs($administrator);
});

it('shows the product form and saved products to administrators', function () {
    $administrator = User::factory()->create(['is_admin' => true]);
    Product::factory()->create([
        'name' => 'Batata rústica',
        'category' => 'acompanhamentos',
        'burger_type' => null,
    ]);

    $this->actingAs($administrator)
        ->get(route('admin'))
        ->assertOk()
        ->assertSee('Cadastrar produto')
        ->assertSee('name="image"', false)
        ->assertSee('Batata rústica')
        ->assertSee('Acompanhamentos')
        ->assertSee('Remover');
});

it('does not allow a regular user to sign in to the admin panel', function () {
    User::factory()->create([
        'email' => 'user@example.com',
        'password' => 'user-password',
        'is_admin' => false,
    ]);

    $this->post(route('admin.login.store'), [
        'email' => 'user@example.com',
        'password' => 'user-password',
    ])->assertSessionHasErrors('email');

    $this->assertGuest();
});

it('stores a product with its image, price, description and burger type', function () {
    Storage::fake('public');
    $administrator = User::factory()->create(['is_admin' => true]);

    $response = $this->actingAs($administrator)->post(route('admin.products.store'), [
        'name' => 'Smash especial',
        'category' => 'lanches',
        'burger_type' => 'smash',
        'description' => 'Pão, carne smash e queijo.',
        'price' => '29.90',
        'image' => UploadedFile::fake()->image('smash.jpg', 1600, 1200),
    ]);

    $response->assertRedirect(route('admin'));
    $response->assertSessionHas('status', 'Produto cadastrado com sucesso.');
    $this->assertDatabaseHas('products', [
        'name' => 'Smash especial',
        'category' => 'lanches',
        'burger_type' => 'smash',
        'description' => 'Pão, carne smash e queijo.',
        'price' => '29.90',
    ]);

    $product = Product::query()->firstOrFail();
    Storage::disk('public')->assertExists($product->image_path);
    expect($product->image_path)->toEndWith('.webp');

    $savedImage = getimagesize(Storage::disk('public')->path($product->image_path));
    expect($savedImage[0])->toBe(800)
        ->and($savedImage[1])->toBe(600)
        ->and($savedImage['mime'])->toBe('image/webp');
});

it('allows drinks and sides without a burger subtype', function () {
    Storage::fake('public');
    $administrator = User::factory()->create(['is_admin' => true]);

    foreach (['bebidas' => 'Suco natural', 'acompanhamentos' => 'Batata frita'] as $category => $name) {
        $this->actingAs($administrator)
            ->post(route('admin.products.store'), [
                'name' => $name,
                'category' => $category,
                'description' => 'Produto preparado na hora.',
                'price' => '12.50',
                'image' => UploadedFile::fake()->image($category.'.jpg'),
            ])
            ->assertRedirect(route('admin'));
    }

    $this->assertDatabaseCount('products', 2);
    $this->assertDatabaseHas('products', [
        'name' => 'Suco natural',
        'category' => 'bebidas',
        'burger_type' => null,
    ]);
    $this->assertDatabaseHas('products', [
        'name' => 'Batata frita',
        'category' => 'acompanhamentos',
        'burger_type' => null,
    ]);
});

it('requires a burger type for burger products', function () {
    Storage::fake('public');
    $administrator = User::factory()->create(['is_admin' => true]);

    $this->actingAs($administrator)
        ->from(route('admin'))
        ->post(route('admin.products.store'), [
            'name' => 'X-Burguer',
            'category' => 'lanches',
            'description' => 'Pão, carne e queijo.',
            'price' => '24.50',
            'image' => UploadedFile::fake()->image('x-burguer.png'),
        ])
        ->assertSessionHasErrors([
            'burger_type' => 'Selecione uma categoria para o lanche.',
        ]);

    $this->assertDatabaseCount('products', 0);
});

it('rejects files that are not supported product images', function () {
    Storage::fake('public');
    $administrator = User::factory()->create(['is_admin' => true]);

    $this->actingAs($administrator)
        ->from(route('admin'))
        ->post(route('admin.products.store'), [
            'name' => 'Refrigerante',
            'category' => 'bebidas',
            'description' => 'Lata 350 ml.',
            'price' => '7.00',
            'image' => UploadedFile::fake()->create('arquivo.svg', 12, 'image/svg+xml'),
        ])
        ->assertSessionHasErrors('image');

    $this->assertDatabaseCount('products', 0);
});

it('shows saved products on their matching public menu pages', function () {
    Product::factory()->create([
        'name' => 'Burger Smash',
        'category' => 'lanches',
        'burger_type' => 'smash',
    ]);
    Product::factory()->create([
        'name' => 'Suco de laranja',
        'category' => 'bebidas',
        'burger_type' => null,
    ]);
    Product::factory()->create([
        'name' => 'Batata frita',
        'category' => 'acompanhamentos',
        'burger_type' => null,
    ]);

    $this->get(route('home'))
        ->assertOk()
        ->assertSee('Burger Smash')
        ->assertSee('Smash')
        ->assertSeeInOrder([
            'class="menu-section"',
            '<section class="menu-catalog"',
            'Burger Smash',
            '</section>',
        ], false);

    $this->get(route('bebidas'))
        ->assertOk()
        ->assertSee('Suco de laranja');

    $this->get(route('acompanhamentopage'))
        ->assertOk()
        ->assertSee('Batata frita');
});

it('allows an administrator to remove a product and its stored image', function () {
    Storage::fake('public');
    $administrator = User::factory()->create(['is_admin' => true]);
    Storage::disk('public')->put('products/remove-me.webp', 'product image');
    $product = Product::factory()->create([
        'name' => 'Produto para remover',
        'category' => 'lanches',
        'burger_type' => 'smash',
        'image_path' => 'products/remove-me.webp',
    ]);

    $this->actingAs($administrator)
        ->delete(route('admin.products.destroy', $product))
        ->assertRedirect(route('home').'#cardapio')
        ->assertSessionHas('status', 'O produto '.$product->name.' foi removido com sucesso.');

    $this->assertDatabaseMissing('products', ['id' => $product->id]);
    Storage::disk('public')->assertMissing('products/remove-me.webp');

    $this->get(route('home'))
        ->assertOk()
        ->assertSee('O produto Produto para remover foi removido com sucesso.')
        ->assertDontSee('data-product-category="smash"', false);
});

it('prevents regular users from removing products', function () {
    $user = User::factory()->create();
    $product = Product::factory()->create();

    $this->actingAs($user)
        ->delete(route('admin.products.destroy', $product))
        ->assertForbidden();

    $this->assertDatabaseHas('products', ['id' => $product->id]);
});

it('escapes product names and descriptions on public pages', function () {
    Product::factory()->create([
        'name' => '<script>alert(1)</script>',
        'category' => 'lanches',
        'burger_type' => 'classicos',
        'description' => '<img src=x onerror=alert(2)>',
    ]);

    $this->get(route('home'))
        ->assertOk()
        ->assertSee('&lt;script&gt;alert(1)&lt;/script&gt;', false)
        ->assertDontSee('<script>alert(1)</script>', false)
        ->assertSee('&lt;img src=x onerror=alert(2)&gt;', false)
        ->assertDontSee('<img src=x onerror=alert(2)>', false);
});
