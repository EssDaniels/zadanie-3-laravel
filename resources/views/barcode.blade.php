<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generator kodu kreskowego</title>
</head>

<body>
  <form action="{{ route('generate.barcode') }}" method="post">
    @csrf
    <label for="text_input">Wprowadź tekst do generowania kodu kreskowego:</label>
    <input type="text" id="text_input" name="text_input" required>
    <input type="submit" value="Generuj kod kreskowy">
  </form>

  @if(isset($text))
  <h2>Wygenerowany kod kreskowy:</h2>
  <img src="{{ asset('barcode.webp') }}" alt="Kod kreskowy">
  @endif
</body>

</html>