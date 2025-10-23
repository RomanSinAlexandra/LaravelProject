@extends('layouts.app')

@section('content')
<h1 class="text-center mb-4">Ваш кошик</h1>

@if(count($cart) === 0)
    <div class="text-center">
        <p class="fs-5">Ваш кошик порожній.</p>
        <a href="{{ route('home') }}" class="btn btn-warhammer mt-3">Повернутись до магазину</a>
    </div>
@else
    <table class="table table-dark table-striped align-middle" id="cartTable">
        <thead>
            <tr>
                <th>Товар</th>
                <th>Кількість</th>
                <th>Ціна</th>
                <th>Разом</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($products as $product)
                @php
                    $quantity = $cart[$product->id] ?? 0;
                    $subtotal = $product->price * $quantity;
                    $total += $subtotal;
                @endphp
                <tr data-id="{{ $product->id }}">
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="70" class="me-3 rounded">
                            <span>{{ $product->name }}</span>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <button class="btn btn-outline-secondary btn-sm quantity-btn" data-action="decrease">−</button>
                            <span class="mx-2 quantity">{{ $quantity }}</span>
                            <button class="btn btn-outline-secondary btn-sm quantity-btn" data-action="increase">+</button>
                        </div>
                    </td>
                    <td class="price">{{ number_format($product->price, 2, ',', ' ') }} грн</td>
                    <td class="subtotal">{{ number_format($subtotal, 2, ',', ' ') }} грн</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3" class="text-end">Загальна сума:</th>
                <th id="total">{{ number_format($total, 2, ',', ' ') }} грн</th>
            </tr>
        </tfoot>
    </table>

    <div class="text-center mt-4">
        <a href="{{ route('home') }}" class="btn btn-outline-light me-3">Продовжити покупки</a>
        <button id="checkoutBtn" class="btn btn-warhammer">Оформити замовлення</button>
    </div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const table = document.getElementById('cartTable');
    const totalEl = document.getElementById('total');

    function parsePrice(str) {
        if (!str) return 0;
        return parseFloat(
            str.toString()
               .replace(/\s/g, '') 
               .replace('грн', '')
               .replace(',', '.')
               .trim()
        ) || 0;
    }

    function recalcTotal() {
        let total = 0;
        table.querySelectorAll('.subtotal').forEach(td => {
            total += parsePrice(td.textContent);
        });
        totalEl.textContent = total.toFixed(2).replace('.', ',') + ' грн';
    }

    table.addEventListener('click', (e) => {
        const btn = e.target.closest('.quantity-btn');
        if (!btn) return;

        const tr = btn.closest('tr');
        const id = tr.dataset.id;
        const action = btn.dataset.action;
        const quantityEl = tr.querySelector('.quantity');
        const subtotalEl = tr.querySelector('.subtotal');
        const priceEl = tr.querySelector('.price');

        let quantity = parseInt(quantityEl.textContent) || 0;
        const price = parsePrice(priceEl.textContent);

        if (action === 'increase') quantity++;
        if (action === 'decrease') quantity--;

        if (quantity <= 0) {
            tr.remove();
        } else {
            quantityEl.textContent = quantity;
            subtotalEl.textContent = (quantity * price).toFixed(2).replace('.', ',') + ' грн';
        }

        recalcTotal();

        fetch(`/cart/update/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ quantity })
        })
        .then(res => res.json())
        .then(data => {
            if (data.status !== 'success') {
                alert('Помилка оновлення кошика на сервері');
            }
            if (!table.querySelector('tbody tr')) {
                const msg = document.createElement('p');
                msg.className = 'text-center fs-5 mt-4';
                msg.textContent = 'Кошик порожній 🕸️';
                table.parentNode.insertBefore(msg, table.nextSibling);
                table.remove();
            }
        })
        .catch(err => {
            console.error(err);
            alert('Помилка мережі при оновленні кошика');
        });
    });
});

document.getElementById('checkoutBtn').addEventListener('click', function() {

    fetch('{{ route("cart.clear") }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === 'success') {
            const table = document.querySelector('table');
            if (table) table.remove();

            const message = document.createElement('div');
            message.className = 'text-center fs-5 mt-4';
            message.innerHTML = `
                <img src="{{ asset('images/check.png') }}" alt="check" width="60" class="mb-3"><br>
                Замовлення оформлено! Ваш кошик порожній.
            `;

            const container = document.querySelector('.text-center.mt-4');
            container.before(message);

            const checkoutButton = document.getElementById('checkoutBtn');
            if (checkoutButton) checkoutButton.remove();

        } else {
            alert('Помилка при оформленні замовлення.');
        }
    })
    .catch(err => console.error(err));
});
</script>
@endif
@endsection
