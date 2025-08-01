<html data-bs-theme="dark">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="p-2 m-auto mt-5" style="max-width: 500px">
        <h3>REPORT GENERATOR</h3>
        <form enctype="multipart/form-data" action="{{url('/generate')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="mb-1">
                    File Clockify
                </label>
                <input type="file" name="file" class="form-control" />
            </div>
            <div class="mb-3">
                <label class="mb-1">
                    Leaders
                </label>
                <div class="form-check">
                    <input name="leaders[]" class="form-check-input" type="checkbox" value="Egi Triyana F" id="lead1" checked>
                    <label class="form-check-label" for="lead1">
                        Egi Triyana F
                    </label>
                </div>
                <div class="form-check">
                    <input name="leaders[]" class="form-check-input" type="checkbox" value="Mahizzar Tamami" id="lead2" checked>
                    <label class="form-check-label" for="lead2">
                        Mahizzar Tamami
                    </label>
                </div>
                <div class="form-check">
                    <input name="leaders[]" class="form-check-input" type="checkbox" value="Mohamad Tebijuniardi" id="lead3" checked>
                    <label class="form-check-label" for="lead3">
                        Mohamad Tebijuniardi
                    </label>
                </div>
                <div class="form-check">
                    <input name="leaders[]" class="form-check-input" type="checkbox" value="Nurarifin" id="lead3" checked>
                    <label class="form-check-label" for="lead3">
                        Nurarifin
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Generate</button>
            </div>
        </form>
    </div>
</body>

</html>
