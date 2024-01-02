<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/dashboard">
        <img src="/img/logo.png" class="avatar img-fluid rounded me-1" alt="User Image" /><span class="align-middle">  SiCakep</span>
</a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item active">
                <a class="sidebar-link" href="/dashboard">
      <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
    </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="/dashboard/expenses">
      <i class="align-middle" data-feather="shopping-cart"></i> <span class="align-middle">Expenses</span>
    </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="/dashboard/incomes">
      <i class="align-middle" data-feather="download"></i> <span class="align-middle">Incomes</span>
    </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="/dashboard/finance">
      <i class="align-middle" data-feather="dollar-sign"></i> <span class="align-middle">Finance</span>
    </a>
            </li>

            <li class="sidebar-header">
                Tools & Components
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="/dashboard/setting">
      <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Settings</span>
        </a>
            </li>
        </ul>

        {{-- <div class="sidebar-cta">
            <div class="sidebar-cta-content">
                <strong class="d-inline-block mb-2">Upgrade to Pro</strong>
                <div class="mb-3 text-sm">
                    Are you looking for more components? Check out our premium version.
                </div>
                <div class="d-grid">
                    <a href="upgrade-to-pro.html" class="btn btn-primary">Upgrade to Pro</a>
                </div>
            </div>
        </div> --}}
    </div>

    <script>
        $(".sidebar-item .sidebar-link").on("click", function()
        {
            $(".sidebar-item").find(".active").removeClass("active");
            $(this).addClass("active");
        });
    </script>

</nav>
