<?php
 



    $user = 'root';
    $pass = 'minhasenha';
    $conn = new PDO('mysql:host=localhost;dbname=meubancodedados', $user, $pass);
    $sql = "INSERT INTO bancos (id, codigo, banco) VALUES (:id,:codigo, :banco)";
    $q = $conn->prepare($sql);


    $row = 1;

    $tipo_arquivo = mb_detect_encoding("BANCOS.csv");

    if (($handle = fopen("BANCOS.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            $num = count($data);
            echo "<p> $num fields in line $row: <br /></p>\n";
            for ($c=0; $c < $num; $c++) {
                $q->execute(array(':id' => $row,
                                  ':codigo' => trim($data[0]),
                                  ':banco' => $data[1]));

                echo $data[$c] . "<br />\n";
            }
            $row++;
        }
        fclose($handle);
    }
         
    echo "<BR>";
    echo "<BR>";
    echo "FINALIZADO!!!";
    

        
        
        