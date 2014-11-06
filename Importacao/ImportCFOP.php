<?php
 



    $user = 'root';
    $pass = 'minhasenha';
    $conn = new PDO('mysql:host=localhost;dbname=meubancodedados', $user, $pass);
    $sql = "INSERT INTO cfops (id, codigo, descricao) VALUES (:id,:codigo, :descricao)";
    $q = $conn->prepare($sql);


    $row = 1;

    $tipo_arquivo = mb_detect_encoding("CFOP.csv");

    if (($handle = fopen("CFOP.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            $num = count($data);
            echo "<p> $num fields in line $row: <br /></p>\n";
            for ($c=0; $c < $num; $c++) {
                $q->execute(array(':id' => $row,
                                  ':codigo' => trim($data[0]),
                                  ':descricao' => $data[1]));

                echo $data[$c] . "<br />\n";
            }
            $row++;
        }
        fclose($handle);
    }
         
    //APAGAR DADOS ERRADOS
    $sqlDelete = "DELETE FROM cfops WHERE codigo = :codigo";
    $delete = $conn->prepare($sqlDelete);
    $delete->execute(array(':codigo' => ''));

    $sqlDelete = "DELETE FROM cfops WHERE codigo LIKE '%000'";
    $delete = $conn->prepare($sqlDelete);
    $delete->execute();
    echo "<BR>";
    echo "<BR>";
    echo "FINALIZADO!!!";
    

        
        
        