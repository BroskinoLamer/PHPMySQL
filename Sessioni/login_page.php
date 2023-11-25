<?php
        $host="localhost";
        $username="root";
        $password="";
        $db="php";
        $nome=$_POST['nome'];
        $cognome=$_POST['cognome'];
        $email=$_POST['email'];
        /*Usando il costruttore della classe mysqli
        costruisce l'oggetto connessione
        */
        $connessione=new mysqli($host,$username,$password,$db);
        /*Verifica se la connessione è avvenuta con successo,
        quindi nel caso in cui sia avvenuta prosegue
        */
        if($connessione==false){
            echo "Connessione non riuscita". $connessione->connect_error;
        }
        echo "Connessione riuscita da ". $connessione->host_info;
        $query = "SELECT * FROM phptest WHERE email = '$email'";
        $result = $connessione->query($query);
    
        if ($result->num_rows > 0) {
            // L'utente è presente nel database
            echo "L'utente $email è presente nel database.";
            session_start();
            $_SESSION['autenticato']="True";

            header("Location: dashboard.php");
        } else {
            // L'utente non è presente nel database
            echo "L'utente $email non è presente nel database.";
        }
        $connessione->close();
    ?>