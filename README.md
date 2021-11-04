# Sistema_registrazione_utenti

Sistema di registrazione e login realizzato in pattern MVC.
Tecnologia usata: Programmazione ad Oggetti in PHP con estensione PDO + database SQL
Tema grafico realizzato in Bootstrap 5

Il progetto è composto di un sistema di registrazione di nuovi utenti che vengono memorizzati
dentro un database. A tale sistema sono state applicate delle chiamate Ajax utili alla validazione
dei singoli campi del form, il quale non accetta nome utente ed email già esistenti nel database ed 
è in grado di bloccare l'invio dei dati quando il controllo sul dato ripetuto ottiene esito negativo.

Il sistema si compone anche di un accesso sicuro di Login che conduce alla visualizzazione di una tabella grafica
contenente gli utenti presenti nel sistema. Sono state qui applicate tutte le tecniche 
disponibili per la messa in sicurezza dell'accesso: validazione lato front-end e back-end di tutti i campi del form,
cifratura della password, integrazione di ReCaptcha, configurazione del file .htaccess.

La tabella presente all'interno del sistema si compone infine di operazioni CRUD da eseguire sugli utenti registrati.

Il progetto è testabile al seguente link:

http://appsolutions.altervista.org








