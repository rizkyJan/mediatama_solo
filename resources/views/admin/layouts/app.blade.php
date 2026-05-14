<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Mediatama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
            overflow-x: hidden;
        }

        .sidebar {
            min-height: 100vh;
            width: 250px;
            transition: all 0.3s ease;
            z-index: 1040;
            background-color: #212529;
        }

        .content-wrapper {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            transition: all 0.3s;
        }

        @media (max-width: 768px) {
            .sidebar {
                margin-left: -250px;
                position: fixed;
                top: 0;
                bottom: 0;
            }

            .sidebar.active {
                margin-left: 0;
                box-shadow: 5px 0 15px rgba(0, 0, 0, 0.3);
            }

            .sidebar-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                background: rgba(0, 0, 0, 0.5);
                z-index: 1030;
            }

            .sidebar-overlay.active {
                display: block;
            }
        }
    </style>
</head>

<body class="d-flex">

    @include('admin.layouts.sidebar')

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="content-wrapper">
        @include('admin.layouts.navbar')

        <main class="container-fluid p-3 p-md-4 flex-grow-1">
            @yield('isi')
        </main>

        <footer class="bg-white border-top py-3 text-center text-muted mt-auto">
            <small>© {{ date('Y') }} Mediatama - Recruitment Test</small>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const toggleBtn = document.getElementById('sidebarToggle');

        function toggleSidebar() {
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        }

        if (toggleBtn) toggleBtn.addEventListener('click', toggleSidebar);
        if (overlay) overlay.addEventListener('click', toggleSidebar);
    </script>
</body>

</html>