<?php
$baza = new mysqli("localhost", "root", "", "skolaa");

if($baza -> error)
{
    echo "Ne moze se povezati";
    die($baza->error);
}


$brojindeksa ="";
$prezime="";
$ime ="";
$sifra ="";
$status ="";

if(isset($_POST['pretrazi']))
{
    $pretraga = $_POST['pretrazi'];
    $upit = "SELECT * from skola where $pretraga like '" . $_POST['pretrazi2'] . "' ";
    $rez = $baza -> query($upit);
    if(!$rez)
{
    echo "Upit se ne moze izvrsiti";
    exit($baza->error);
}

if((!($red = $rez -> fetch_assoc())))
{
    echo "Nema trazenog studenta";
}
else
{
$brojindeksa =$red['brIndeksa'];
$prezime=$red['prezime'];
$ime =$red['ime'];
$sifra =$red['sifra'];
$status =$red['status'];

}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ispit1</title>
</head>
<body>
    <form method="post" action="index.php">
    <table bgcolor=#ccc border="o">
        <tr>
        <td>
            Broj indeksa
        </td>
        <td>
            <input type="text" name="brojIndeksa" value="<?php echo $brojindeksa?>">
        </td>
        
        </tr>
        <tr>
        <td>
            Prezime
        </td>
        <td>
            <input type="text" name="prezime" value="<?php echo $prezime?>">
        </td>
        
        </tr>
        <tr>
        <td>
            Ime
        </td>
        <td>
            <input type="text" name="ime" value="<?php echo $ime?>">
        </td>
        
        </tr>
        <tr>
        <td>
            Sifra smera
        </td>
        <td>
            <input type="text" name="sifra" value="<?php echo $sifra?>">
        </td>
        
        </tr>
        <tr>
            <td>Status <?php
            if($status == "B")
            {?>
            <label>B
                <input type="radio" name="status" value="B" checked="checked">
                S
                <input type="radio" name="status" value="S">
            </label>
                <?php
            }
         else
            {?>
                <label>B
                <input type="radio" name="status" value="B">
                S
                <input type="radio" name="status" value="S" checked="checked">
                
            </label>
                <?php
            }?>

            </td>

            <tr>
                <td colspan="2" align="center">
                    <select name="pretrazi">
                        <option value="brIndeksa">Broj indeksa</option>
                        <option value="ime">Ime</option>
                        <option value="prezime">prezime</option>
                        <option value="sifra">Sifra smera</option>
                    </select>
                    <input type="text" name="pretrazi2" >
                    <input type="submit" name= "pretraga" value="Pretraga">
                </td>
            </tr>
          





        </tr>
    </table>
    </form>
    
    
</body>
</html>