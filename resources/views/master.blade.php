
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Learning laravel with Taylor">
    <meta name="author" content="Sean Loughrey">

    <title><?= env('app_name') ?></title>

    <!-- stylesheets -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
  </head>

  <body>

    <div class="container">
      @include ('snippets.header')
      @include ('snippets.nav')
      @include ('snippets.notices')
    </div>

    <main role="main" class="container">

      @yield ('featured_content')
      
      <div class="row">
          @yield ('content')
          @include ('snippets.sidebar')
      </div>

    </main>

    @include ('snippets.footer')
  </body>

</html>
