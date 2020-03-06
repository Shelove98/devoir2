<?php
session_start();
//session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="code">code</label>
        <input type="text" name="code">
        <label for="nom">nom</label>
        <input type="text" name="nom">
        <label for="prenom" >prenom</label>
        <input type="text" name="prenom">
        <label for="prenom" >Type Personne</label>
        <select  id="" name="Type">
                <option value=""></option>
                <option value="Etudiant">Etudiant</option>
                <option value="Professeur">Professeur</option>
        </select>
        
        <button type="submit" name="envoyer">Envoyer</button>
    </form>
    <br><br>
    <form action="" method="GET">
         <label for="recherche"> Type</label>
        <select  id="" name="re">
        <?php while($_SESSION['etudiant']){ ?>
            <option value=""><?php echo($_SESSION['etudiant'][0]) ?></option>
                
           <?php } ?>
        </select>

        <select class="form-control" id="exampleFormControlSelect1">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
        
    </form>
   
<br><br>
    <table border="1px;" style="background:cadetblue;">
            <thead>
                    <th>Code</th>
                    <th></th>
                    <th>Nom</th>
                    <th></th>
                    <th>Prenom</th>
                    <th></th>
                    <th>Type</th>
            </thead>

            <tbody>
            
                <?php
               

                     require("ClassTest.php");
                    if(isset($_POST['envoyer'])){
                       
                        $code = $_POST['code'];
                        $nom = $_POST['nom'];
                        $prenom = $_POST['prenom'];
                        $Type= $_POST['Type'];
                        $et = new Etudiant($code,$nom,$prenom,$Type);
                        $t_et = [
                        'code'=>$et->getCode(),
                        'nom'=>$et->getNom(),
                        'prenom'=>$et->getPrenom(),
                        'Type'=>$et->getType()
                        ];
                        
                        $_SESSION['etudiant'][]=$t_et;

                        //$tde= ['moi','toi'];

                        
                        //$m= $_SESSION['etudiant'][0]['code']."".$_SESSION['etudiant'][0]['nom']."".$_SESSION['etudiant'][0]['prenom']."".$_SESSION['etudiant'][0]['Type'];
                     
                        $cher = array_search(0,$_SESSION);
                       echo("<pre>");
                        print_r($cher);
                        
                    echo("</pre>");
                    

                }
            
                foreach($_SESSION['etudiant'] as $t){
                    echo("
                        <tr>
                            <td>$t[code]</td>
                            <td></td>
                            <td>$t[nom]</td>
                            <td></td>
                            <td>$t[prenom]</td>
                            <td></td>
                            <td>$t[Type]</td>
                        </tr>
                    
                    ");
                }

                //echo("<pre>");
                    //print_r($_SESSION['etudiant'][0]['prenom']);
                    //echo("</pre>");

                    

                
                 ?> 
            </tbody>
    </table>

    <br><br>
    <table border="1px;" style="background:cadetblue;">
            <thead>
                    <th>Code</th>
                    <th></th>
                    <th>Nom</th>
                    <th></th>
                    <th>Prenom</th>
                    <th></th>
                    <th>Type</th>
            </thead>

            <tbody>
                    <?php
                        if(isset($_GET['recherche'])){
                        $recherche = (int)$_GET['re'];
                        echo("<tr>");
                        echo('<td>'.$_SESSION['etudiant'][$recherche]['code'].'</td>');
                        echo("<td></td>");
                        echo('<td>'.$_SESSION['etudiant'][$recherche]['nom'].'</td>');
                        echo("<td></td>");
                        echo('<td>'.$_SESSION['etudiant'][$recherche]['prenom'].'</td>');
                        echo("<td></td>");
                        echo('<td>'.$_SESSION['etudiant'][$recherche]['Type'].'</td>');
                        echo("</tr>");
                        
                    //getCode($recherche);
                        
                    }
                        
                ?> 
            </tbody>
    </table>
</body>
</html>