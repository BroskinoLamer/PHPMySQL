<?php
    $host="localhost";
    $username="root";
    $password="";
    $db="php";
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
    $sql="INSERT INTO phptest(nome,cognome,email) VALUES('ciao1','ciao2','ciao3')";
    if($connessione->query($sql)){
        echo "Dati inseriti con successo";
    }
    $sql="SELECT * FROM phptest";
    /*Se la query riesce salva il risultato della query in result*/
    if($result=$connessione->query($sql)){
    /*Result è un oggetto che contiene la proprietà num_rows*/
        if($result->num_rows >0){
            while($row=$result->fetch_array()){//Row è un array associativo
                echo "<br>".  $row['id'] . $row['email'] . $row['nome'] . $row['cognome'];  
            }
        }
    }
    $connessione->close();
?>
