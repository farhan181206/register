<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title') | Dashboard</title>

  @include('layouts.include')
  @stack('style')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      @include('layouts.header')
      <div class="main-sidebar sidebar-style-2">
        @include('layouts.aside')
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>@yield('main')</h1>
          </div>

          <div class="section-body">
            @yield('content')
          </div>
        </section>
      </div>
      @include('layouts.footer')
    </div>
  </div>

  @include('layouts.script')
  @stack('script')
  <!-- Page Specific JS File -->
</body>
</html>
