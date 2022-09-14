<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Assignment - Business Automation Ltd</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-light bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand text-white" href="#">
                <img src="https://www.ba-systems.com/images/logo-ba.webp" alt="" width="100" class="">
                Business Automation Ltd.
              </a>
            </div>
          </nav>
          <div class="container mt-4">
            @if ($solution_no == 1)
                    <h3><b>Speed with greater than 60!</b></h3>
                    <h4>Total : {{ count($speeds) }}</h4></h4>
                    <hr class="mb-3">
                    @foreach ($speeds as $value)
                        <p>{{ $value['value'] }}</p>
                    @endforeach
            @elseif($solution_no == 2)
                <h3><b>The Exepected Array:</b></h3>
                <hr class="mb-3">
                @foreach ($sorted as $value)
                    <p>{{ $value }}</p>
                @endforeach
            {{-- solution no 3  --}}
            @elseif($solution_no == 3)
            <form action="{{ route('check_ip',3) }}" method="GET">
                @csrf
                <fieldset>
                <legend><b>Enter IP address!</b></legend>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">IP Address</label>
                    <input type="text" id="ip_address" name="ip_address" class="form-control" placeholder="IP Address">
                </div>
                @if (!empty($response))
                    <div class="alert {{ $response == 'TRUE' ? 'alert-success' : 'alert-danger' }} mt-3" role="alert">
                        The address "{{ $ip_address }}" is: "{{ $response }}"
                    </div>
                @endif
                <button type="submit" class="btn btn-dark">Check IP Address</button>
                </fieldset>
            </form>
            @endif
        </div>
    </body>
</html>
