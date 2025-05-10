<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leads Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background: #f8fafc; }
        .modern-btn, .btn {
            transition: transform 0.18s cubic-bezier(.4,2,.3,1), box-shadow 0.18s;
            will-change: transform;
        }
        .modern-btn:hover, .btn:hover, .modern-btn:focus, .btn:focus {
            transform: scale(1.06);
            box-shadow: 0 4px 18px #0d6efd33;
            z-index: 2;
        }
        .modern-btn:active, .btn:active {
            box-shadow: 0 0 0 8px #0d6efd22;
        }
        .modern-btn:active, .modern-btn.active, .modern-btn:focus {
            box-shadow: 0 0 0 0.2rem #0d6efd33;
            background: #0d6efd !important;
            color: #fff !important;
        }
        .modern-switch .form-check-input {
            cursor: pointer;
            transition: box-shadow 0.2s;
        }
        .modern-switch .form-check-input:checked {
            background-color: #0d6efd;
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem #0d6efd33;
        }
        .modern-list {
            border-radius: 8px;
            margin-bottom: 8px;
            transition: box-shadow 0.2s, background 0.2s;
        }
        .modern-list:hover {
            box-shadow: 0 2px 12px #0d6efd22;
            background: #f1f3f9;
        }
        .modern-card {
            border-radius: 16px;
            box-shadow: 0 2px 16px #0d6efd11;
            border: none;
        }
        .modern-header {
            background: linear-gradient(90deg, #0d6efd 60%, #0dcaf0 100%);
            color: #fff;
            padding: 32px 0 24px 0;
            border-radius: 0 0 32px 32px;
            margin-bottom: 32px;
            box-shadow: 0 4px 24px #0d6efd22;
        }
        .modern-footer {
            background: #fff;
            color: #888;
            text-align: center;
            padding: 16px 0;
            border-top: 1px solid #eee;
            margin-top: 48px;
            font-size: 15px;
        }
        .btn-ripple {
            position: relative;
            overflow: hidden;
        }
        .btn-ripple .ripple {
            position: absolute;
            border-radius: 50%;
            transform: scale(0);
            animation: ripple 0.6s linear;
            background: rgba(13,110,253,0.25);
            pointer-events: none;
        }
        @keyframes ripple {
            to {
                transform: scale(2.5);
                opacity: 0;
            }
        }
        @media (max-width: 768px) {
            .modern-btn { min-width: 80px; font-size: 14px; }
            .modern-switch label { font-size: 13px; }
            .modern-header { padding: 24px 0 16px 0; }
        }
    </style>
</head>
<body>
    <div class="modern-header">
        <div class="container d-flex align-items-center">
            <i class="bi bi-bar-chart-fill fs-2 me-3"></i>
            <h1 class="mb-0 fw-bold" style="letter-spacing:1px;">Leads Management</h1>
        </div>
    </div>
    <main class="py-4">
        @yield('content')
    </main>
    <div class="modern-footer">
        &copy; {{ date('Y') }} Leads Management &mdash; Powered by Muhammad Jihad Zahran
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.querySelectorAll('.btn, .modern-btn').forEach(btn => {
        btn.classList.add('btn-ripple');
        btn.addEventListener('click', function(e) {
            const circle = document.createElement('span');
            circle.classList.add('ripple');
            const rect = btn.getBoundingClientRect();
            circle.style.width = circle.style.height = Math.max(rect.width, rect.height) + 'px';
            circle.style.left = (e.clientX - rect.left - rect.width/2) + 'px';
            circle.style.top = (e.clientY - rect.top - rect.height/2) + 'px';
            btn.appendChild(circle);
            setTimeout(() => circle.remove(), 600);
        });
    });
    </script>
    @stack('scripts')
</body>
</html> 