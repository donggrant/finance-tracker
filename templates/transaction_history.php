<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">  

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="your name">
        <meta name="description" content="include some description about your page">  

        <title>Trivia Game</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> 
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="">FinTrek</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <?=$_SESSION["name"]?>
                </li>
                <li class="nav-item">
                    <?=$_SESSION["email"]?>
                </li> 
                </ul>
            </div>  

            <a class="nav-link" href="<?=$this->url?>/new_transaction/">New Transaction</a>

            <a class="nav-link" href="<?=$this->url?>/logout/">Logout</a>
        </nav>

        <div class="container" style="margin-top: 15px;">
            <div class="row col-xs-8">
                <h1>Transaction History</h1>
                <h3>Hello <?=$_SESSION["name"]?>!</h3>
                <h4>Balance: <?=$balance?></h4>
            </div>
            <br>
            <div class="row">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Type</th>
                    </tr> 
                    <?php 
                        foreach($transaction_history as $transaction) {
                    ?>
                    <tr>
                        <td><?=$transaction["name"]?></td>
                        <td><?=$transaction["t_date"]?></td>
                        <td><?=$transaction["amount"]?></td>
                        <td><?=$transaction["type"]?></td>
                    </tr> 
                    <?php 
                        }
                    ?>
                </table>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>