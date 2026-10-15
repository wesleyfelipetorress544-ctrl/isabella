<style>
    .catalog-products{grid-template-columns:repeat(auto-fill,minmax(min(100%,160px),1fr));gap:14px}
    .catalog-product-card{transition:transform .18s ease,box-shadow .18s ease}
    .catalog-product-trigger{display:block;width:100%;height:100%;padding:0;border:0;background:transparent;color:inherit;text-align:left;cursor:pointer}
    .catalog-product-trigger:focus-visible{outline:3px solid #d99e00;outline-offset:3px}
    .catalog-product-info{display:block}
    .catalog-product-title{display:block;margin:0 0 6px;color:#1d1d1d;font-size:17px;font-weight:800;line-height:1.2}
    .catalog-product-description{display:-webkit-box;min-height:36px;margin:0 0 10px;overflow:hidden;color:#666;font-size:12px;line-height:1.45;-webkit-box-orient:vertical;-webkit-line-clamp:2}
    .catalog-product-info strong{display:block;color:#111;font-size:15px}
    .catalog-product-trigger>img{display:block;width:100%;aspect-ratio:4/3;object-fit:cover}
    .catalog-product-trigger .catalog-product-info{padding:12px}
    .catalog-product-card.is-opening{position:relative;z-index:2;transform:scale(1.045);box-shadow:0 12px 30px #10182825}
    .catalog-product-card.is-opening .catalog-product-title{transform:scale(1.04);transform-origin:left center;transition:transform .18s ease}
    .product-dialog{width:min(620px,calc(100vw - 28px),calc(100vh - 28px));height:min(620px,calc(100vw - 28px),calc(100vh - 28px));max-width:none;max-height:none;aspect-ratio:1;padding:0;overflow:auto;border:0;border-radius:18px;background:#fff;color:#1d1d1d;box-shadow:0 24px 90px #0005}
    .product-dialog::backdrop{background:#111a}
    .product-dialog-content{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);min-height:100%}
    .product-dialog-image{width:100%;height:100%;min-height:0;object-fit:cover;background:#f4f0e7}
    .product-dialog-details{position:relative;display:flex;flex-direction:column;justify-content:center;padding:34px 28px}
    .product-dialog-close{position:absolute;top:12px;right:12px;width:36px;height:36px;border:0;border-radius:50%;background:#f2f2f2;color:#222;font-size:22px;cursor:pointer}
    .product-dialog-category{display:block;margin:10px 0 8px;color:#986700;font-size:12px;font-weight:800;letter-spacing:.06em;text-transform:uppercase}
    .product-dialog-details h2{margin:0 34px 12px 0;font-size:26px;font-weight:800}
    .product-dialog-description{color:#555;line-height:1.6;white-space:pre-line}
    .product-dialog-price{display:block;margin:18px 0;color:#111;font-size:22px}
    .product-dialog-form{display:flex;align-items:end;gap:12px}
    .product-dialog-form label{display:grid;gap:6px;font-size:13px;font-weight:700}
    .product-dialog-form input{width:76px;height:44px;padding:8px;border:1px solid #ccc;border-radius:7px}
    .product-dialog-submit{min-height:44px;padding:0 18px;border:0;border-radius:7px;background:#ffcc00;color:#111;font-weight:800;cursor:pointer}
    .product-add-notice{position:fixed;z-index:1300;right:20px;bottom:24px;display:flex;align-items:center;gap:10px;max-width:calc(100% - 40px);padding:15px 20px;border-radius:10px;background:#173d25;color:#fff;box-shadow:0 8px 26px #0003;font-weight:750;opacity:0;transform:translateY(16px);pointer-events:none;transition:opacity .2s ease,transform .2s ease}
    .product-add-notice.is-error{background:#9a2c1d}
    .product-add-notice.is-visible{opacity:1;transform:translateY(0)}
    .product-add-notice[hidden]{display:none}
    .catalog-action-error{position:fixed;top:112px;right:16px;z-index:1200;max-width:min(420px,calc(100% - 32px));margin:0;padding:13px 16px;border-radius:9px;background:#fff0ed;color:#9a2c1d;box-shadow:0 5px 18px #0002;font-weight:650}
    @media(max-width:560px){.product-dialog-content{grid-template-columns:1fr;grid-template-rows:42% 58%}.product-dialog-details{justify-content:flex-start;padding:22px 20px}.product-dialog-details h2{font-size:23px}.product-dialog-category{margin-top:0}.product-dialog-description{margin:0}.product-dialog-price{margin:10px 0}.product-dialog-form{gap:8px}.product-dialog-submit{padding:0 12px}}
    @media(prefers-reduced-motion:reduce){.catalog-product-card,.catalog-product-card.is-opening .catalog-product-title,.product-add-notice{transition:none}.catalog-product-card.is-opening{transform:none}}
</style>

@if($errors->any())
    <p class="catalog-action-error" role="alert">{{ $errors->first() }}</p>
@endif

<dialog class="product-dialog" id="product-dialog" aria-labelledby="product-dialog-title">
    <div class="product-dialog-content">
        <img class="product-dialog-image" id="product-dialog-image" src="" alt="">
        <div class="product-dialog-details">
            <button class="product-dialog-close" type="button" aria-label="Fechar detalhes do produto">&times;</button>
            <span class="product-dialog-category" id="product-dialog-category"></span>
            <h2 id="product-dialog-title"></h2>
            <p class="product-dialog-description" id="product-dialog-description"></p>
            <strong class="product-dialog-price" id="product-dialog-price"></strong>
            <form class="product-dialog-form" method="POST" action="{{ route('cart.items.store') }}">
                @csrf
                <input type="hidden" name="product_id" id="product-dialog-product-id">
                <label for="product-dialog-quantity">Quantidade
                    <input id="product-dialog-quantity" type="number" name="quantity" min="1" max="20" value="1" required>
                </label>
                <button class="product-dialog-submit" type="submit">Adicionar ao pedido</button>
            </form>
        </div>
    </div>
</dialog>
<p class="product-add-notice" id="product-add-notice" role="status" aria-live="polite" hidden></p>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const dialog = document.getElementById('product-dialog');

        if (!dialog) {
            return;
        }

        const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        const notice = document.getElementById('product-add-notice');
        let noticeTimeout;

        const showNotice = (message, isError = false) => {
            window.clearTimeout(noticeTimeout);
            notice.textContent = message;
            notice.classList.toggle('is-error', isError);
            notice.hidden = false;
            window.requestAnimationFrame(() => notice.classList.add('is-visible'));
            noticeTimeout = window.setTimeout(() => {
                notice.classList.remove('is-visible');
                window.setTimeout(() => {
                    notice.hidden = true;
                }, reducedMotion ? 0 : 200);
            }, 3000);
        };

        document.addEventListener('click', (event) => {
            const trigger = event.target.closest('.catalog-product-trigger');

            if (trigger) {
                const card = trigger.closest('.catalog-product-card');
                card.classList.add('is-opening');

                window.setTimeout(() => {
                    document.getElementById('product-dialog-image').src = trigger.dataset.productImage;
                    document.getElementById('product-dialog-image').alt = trigger.dataset.productName;
                    document.getElementById('product-dialog-title').textContent = trigger.dataset.productName;
                    document.getElementById('product-dialog-description').textContent = trigger.dataset.productDescription;
                    document.getElementById('product-dialog-category').textContent = trigger.dataset.productCategoryLabel;
                    document.getElementById('product-dialog-price').textContent = `R$ ${trigger.dataset.productPrice}`;
                    document.getElementById('product-dialog-product-id').value = trigger.dataset.productId;
                    document.getElementById('product-dialog-quantity').value = '1';
                    card.classList.remove('is-opening');
                    dialog.showModal();
                }, reducedMotion ? 0 : 180);
            }

            if (event.target.closest('.product-dialog-close')) {
                dialog.close();
            }
        });

        document.querySelector('.product-dialog-form').addEventListener('submit', async (event) => {
            event.preventDefault();

            const form = event.currentTarget;
            const submitButton = form.querySelector('button[type="submit"]');
            submitButton.disabled = true;

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: {
                        Accept: 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    body: new FormData(form),
                });
                const result = await response.json();

                if (!response.ok) {
                    const firstError = Object.values(result.errors ?? {}).flat()[0];
                    throw new Error(firstError ?? result.message ?? 'Não foi possível adicionar o produto. Tente novamente.');
                }

                document.querySelectorAll('[data-cart-item-count]').forEach((counter) => {
                    counter.textContent = result.count;
                });
                dialog.close();
                showNotice(result.message);
            } catch (error) {
                showNotice(error.message || 'Não foi possível adicionar o produto. Tente novamente.', true);
            } finally {
                submitButton.disabled = false;
            }
        });

        dialog.addEventListener('click', (event) => {
            if (event.target === dialog) {
                dialog.close();
            }
        });
    });
</script>
