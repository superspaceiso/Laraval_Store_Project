<!DOCTYPE html>
<html>

<head>
  @yield('title')
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm">
        <nav class="nav">
          <a class="nav-link" href="/">Home</a>
          <a class="nav-link" href="/store">Store</a>
          <a class="nav-link" href="/basket">Basket</a>
          <a class="nav-link" href="/account">Account</a>
        </nav>
      </div>
    </div>
    @yield('content')
  </div>
</body>

</htmL>
