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


        <div class="container" style="margin-top: 15px;">
            <div class="row col-xs-8">
                <h1>New Transaction</h1>
                <h3>Hello <?=$_SESSION["name"]?>! Please fill out the form below:</h3>
            </div>
            <div class="row">
                <div class="col-xs-8 mx-auto">
                <form action="<?=$this->url?>/new_transaction/" method="post">
                    <div class="h-100 p-5 bg-light border rounded-3">
                        <h2>Transaction</h2>
                        <br><br>
                        <p>Name of Transaction:</p>
                        <input type="text" name="name" value=""/>
                        <br><br>
                        <p>Date:</p>
                        <input type="date" name="date" value=""/>
                        <br><br>
                        <p>Amount:</p>
                        <input type="number" name="amount" value=0/>
                        <br><br>
                        <p>Type:</p>
                        <select name="type">
                            <option value="credit" selected>Credit (Deposit)</option>
                            <option value="debit">Debit (Withdrawal)</option>
                        </select>
                        <br><br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <br><br>
                    <div class="text-center">
                        <a href="<?=$this->url?>/logout/" class="btn btn-danger">Log out</a>
                    </div>
                    <br>
                </form>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>