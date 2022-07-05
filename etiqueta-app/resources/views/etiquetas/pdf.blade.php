<?php

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Etiqueta</title>
</head>

<body>


    <div style="text-align:center; border: solid; columns: 20;">
        <header>
            <p style="text-align:center">
                <img src="images\{{$input->logo}}" alt="" width="400" height="100" class="d-inline-block align-text-top">
            </p>
        </header>

        <div class="card form-control">
            <div class="desktop-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-row label-block input-text">
                                <p style="text-align:center">
                                    <strong>{{$input->cliente }}</strong>
                                </p>
                                <p style="text-align:center">
                                    {{$input->nome_equipamento}}
                                </p>
                                <p style="text-align:center; border: none; word-wrap: break-word;">
                                    {{$input->observacao}}

                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-row label-block input-text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-row label-block input-text">

                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>


    </div>




</body>

</html>