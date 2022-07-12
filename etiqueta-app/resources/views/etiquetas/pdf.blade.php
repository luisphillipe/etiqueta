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


    <div style="padding-left: 0px; padding-right: 0px; border: solid; columns: 20; width:800; height:520;">
        <header>
            <p style="text-align:center">
                <img src="{{$input->logo}}" alt="" width="450" height="100" class="d-inline-block align-text-top">
            </p>
        </header>

        <div class="card form-control">
            <div class="desktop-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2" style="align-content: flex-start;">
                            <div class="form-row label-block input-text">
                                <p style="text-align:center; font-size: 28pt;" style="text-align: center;">
                                    {{$input->cliente }}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2" style="align-content: center;">
                                <div class="form-row label-block input-text">
                                    <p style="text-align:center; font-size: 28pt;" style="text-align: center;">
                                        <strong>{{$input->nome_equipamento}}</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2" style="align-content: flex-end;">
                                <div class="form-row label-block input-text" style="text-align: justify;">
                                    <p style="text-align:center; border: none; word-wrap: break-word; font-size: 20pt;">
                                        {{$input->observacao}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

</body>

</html>