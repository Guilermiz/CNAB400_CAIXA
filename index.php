<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .container{
            margin-top: 30px;
        }
    </style>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>CNAB COPIA</title>
</head>
<body>
    <div class="container">
        <hr>
        <div class="row">
            <h3><b>Remessa</b></h3>
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="gerenciamento.php" method="POST" id="formRemessa">
                <div class="form-group">
                    <br>
                    <button class="btn btn-primary" name="btnGerarRemessa" id="btnEnviarRetorno">Gerar Arquivo de Remessa</button>
                    <br><br>
                </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
        <hr>
    </div>
</body>
</html>