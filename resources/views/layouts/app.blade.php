<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-card {
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            padding: 1rem;
            transition: background-color 0.3s ease;
        }

        .product-card:hover {
            background-color: #f8f9fa;
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
    @notifyCss
</head>
<body>
@include('notify::components.notify')

@yield('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    const pusher = new Pusher('{{ env("PUSHER_APP_KEY") }}', {
        cluster: '{{ env("PUSHER_APP_CLUSTER") }}',
    });

    const channel = pusher.subscribe('products');
    channel.bind('product-updated', function(data) {
        const list = document.getElementById('product-list');
        const count = document.getElementById('product-count');
        const product = data.product;

        const col = document.createElement('div');
        col.className = 'col-md-4 mb-4 product-item fade-in';
        col.innerHTML = `
            <div class="product-card h-100">
                <h5 class="fw-bold">${product.name}</h5>
                <p class="text-muted mb-2">${product.description.substring(0, 80)}...</p>
                <div class="text-primary fw-semibold">$${product.price}</div>
            </div>
        `;

        list.prepend(col);

        // Update total count
        const currentCount = list.querySelectorAll('.product-item').length;
        count.innerText = `Total: ${currentCount}`;

    });
</script>
@notifyJs
</body>
</html>
