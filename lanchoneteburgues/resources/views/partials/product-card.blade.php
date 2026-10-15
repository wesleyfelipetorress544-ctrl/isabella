<article class="catalog-product-card" data-product-category="{{ $product->burger_type ?? $product->category }}">
    <button
        class="catalog-product-trigger"
        type="button"
        aria-haspopup="dialog"
        data-product-id="{{ $product->id }}"
        data-product-name="{{ $product->name }}"
        data-product-description="{{ $product->description }}"
        data-product-price="{{ number_format((float) $product->price, 2, ',', '.') }}"
        data-product-image="{{ asset('storage/' . $product->image_path) }}"
        data-product-category-label="{{ $product->category === 'lanches' ? \App\Models\Product::BURGER_TYPES[$product->burger_type] : \App\Models\Product::CATEGORIES[$product->category] }}">
        <img src="{{ asset('storage/' . $product->image_path) }}" alt="" loading="lazy">
        <span class="catalog-product-info">
            <span class="catalog-product-category">
                {{ $product->category === 'lanches' ? \App\Models\Product::BURGER_TYPES[$product->burger_type] : \App\Models\Product::CATEGORIES[$product->category] }}
            </span>
            <span class="catalog-product-title">{{ $product->name }}</span>
            <span class="catalog-product-description">{{ $product->description }}</span>
            <strong>R$ {{ number_format((float) $product->price, 2, ',', '.') }}</strong>
        </span>
    </button>
</article>
