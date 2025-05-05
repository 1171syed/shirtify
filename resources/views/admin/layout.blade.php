<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard – Shirtify</title>
  @stack('style')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet"/>
  <style>
    body {
      font-family: "Segoe UI", sans-serif;
      background-color: #f5f7fa;
    }

    .sidebar {
      height: 100vh;
      background-color: #ffffff;
      border-right: 1px solid #dee2e6;
    }

    .sidebar a {
      color: #495057;
      padding: 12px 20px;
      display: block;
      text-decoration: none;
      font-weight: 500;
      transition: 0.3s ease;
    }

    .sidebar a:hover {
      background-color: #f1f3f5;
      border-left: 3px solid #0d6efd;
    }

    .sidebar .active {
      background-color: #e9f2ff;
      border-left: 3px solid #0d6efd;
    }

    .card {
      border: none;
      box-shadow: 0 0 8px rgba(0, 0, 0, 0.05);
      border-radius: 12px;
    }

    .card-icon {
      font-size: 28px;
      color: #0d6efd;
    }

    .content {
      padding: 30px;
    }

    .table th, .table td {
      vertical-align: middle;
    }

    .topbar {
      background-color: #ffffff;
      padding: 15px 30px;
      border-bottom: 1px solid #dee2e6;
      font-size: 18px;
      font-weight: 600;
    }
  </style>
</head>
<body>

  <div class="container-fluid">
    <div class="row g-0">

      <!-- Sidebar -->
      <div class="col-md-2 sidebar">
        <div class="text-center py-4 fs-4 border-bottom">🧥 <strong>Shirtify</strong></div>
        <a href="/admin/main" class="active"><i class="ri-dashboard-line me-2"></i> Dashboard</a>
        <a href="/admin/products"><i class="ri-shirt-line me-2"></i> Products</a>
        <a href="/admin/orders"><i class="ri-shopping-bag-line me-2"></i> Orders</a>
        <a href="{{ route('admin.cat') }}"><i class="ri-apps-2-line"></i> Categories</a>
        <a href="#"><i class="ri-user-line me-2"></i> Users</a>
        <form method="POST" action="{{ route("logout") }}">
            @csrf
            <button class="nav-link text-danger mt-auto">Logout</button>
        </form>
      </div>

      <!-- Main Content -->
      <div class="col-md-10 content">
        <div class="topbar">Admin Dashboard</div>

            @yield('main')

      </div>
    </div>
  </div>

  @stack('scripts')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
