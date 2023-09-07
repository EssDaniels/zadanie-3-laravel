<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generator kodu kreskowego</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow">
          <div class="card-header bg-info text-white">Generator kodu kreskowego</div>
          <div class="card-body">
            <form action="{{ route('generate.barcode') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="text_input">Wprowadź tekst do generowania kodu kreskowego:</label>
                <input type="text" id="text_input" name="text_input" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-info">Generuj kod kreskowy</button>
            </form>
          </div>
        </div>
        @if(isset($text))
        <div class="mt-4">
          <h2>Wygenerowany kod kreskowy:</h2>
          <img src="{{ url('storage/barcode.webp') }}" alt="Kod kreskowy">
        </div>
        @endif
      </div>
    </div>
  </div>
</body>

</html>