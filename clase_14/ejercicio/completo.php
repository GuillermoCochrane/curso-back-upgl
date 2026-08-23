<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

  <title>Pagina 1</title>
  <style>
    body {
      margin: 0;
      background-color: #f4f1de;
      color: #2f3e46;
      border-top: 6px solid #264653;
      border-bottom: 6px solid #264653;
      min-height: 100vh;
    }

    header {
      padding: 24px;
      background-color: #2a9d8f;
      border-top: 4px solid #1d6f66;
      border-bottom: 4px solid #101111;
      color: #ffffff;
    }

    footer {
      padding: 24px;
      background-color: #ff3300;
      border-top: 4px solid #b94f38;
      border-bottom: 4px solid #b94f38;
      color: #ffffff;
    }
  </style>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pagina2.php">PAGINA 2</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="www.facebook.com">IR A MI FACEBOOK</a></li>
                <li><a class="dropdown-item" href="www.instagram.com">IR A MI SUPER INSTAGRAM</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="www.farmearaura.com">IR A FARMEAR AURA</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
  </header>

  <body>
    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Saepe, officia vitae soluta voluptas aut et maiores fugiat quisquam dolorem totam ab excepturi nesciunt laborum eius omnis repellat ad, aperiam dolore.
    <h1>PAGINA 1 DEL BODY </h1>
    <footer>
      <h1>ESTE ES EL FOOTER Y SALE BIEN EN TODOS LADOS!</h1>
    </footer>
  </body>

</html>