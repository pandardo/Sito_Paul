<?php
 
function isValidEmail($email){
    return eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email);
}
 
if (isset($_POST['submit'])) {
    $nome=$_POST['nome'];
    $email=$_POST['email'];
    $messaggio=$_POST['contenuto_email'];
    if (!empty($nome)) {
        if (!empty($email)) {
            if (isValidEmail($email)) {
                if (!empty($messaggio)) {
                            $testo_del_messaggio="Nome: $nome\n";
                            $testo_del_messaggio.="Email: $email\n";
                            $testo_del_messaggio.="Messaggio: $messaggio\n";
                            $esito=mail("dariodippi@gmail.com","Messaggio di $nome ($email)", $testo_del_messaggio);
                            if ($esito) {
                                header("location:  emailinviata.php");
                            } else {
                                header("location:  errore.php");
                            }
                } else {
                    header("location:  errore.php?motivo=Error Message");
                }
            } else {
                header("location:  errore.php?motivo=Error Email");
            }
        } else {
            header("location:  errore.php?motivo=Error Email");
        }
    } else {
        header("location:  errore.php?motivo=Error Name");
    }
} else {
    header("location:  errore.php?motivo=Error Form");
}
 
?>