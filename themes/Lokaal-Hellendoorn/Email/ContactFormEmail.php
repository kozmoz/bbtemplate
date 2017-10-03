<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>GrandDuet.nl</title>
</head>
<body bgcolor="#f7f7f7" style="font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-weight: 200; font-size: 18px;">
<br><br>
<table class="body-wrap" width="100%">
    <tr>
        <td class="container" bgcolor="#FFFFFF">
            <table cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <br><br>
                        <p>Iemand heeft het contactformulier ingevuld op GrandDuet.nl:</p>
                        <br><br>
                        <table border="0" cellpadding="7" cellspacing="2" width="100%">
                            <tr>
                                <td width="300">Voornaam</td>
                                <td><?php echo $firstname ?></td>
                            </tr>
                            <tr>
                                <td width="300">Achternaam</td>
                                <td><?php echo $lastname ?></td>
                            </tr>
                            <tr>
                                <td width="300">Telefoonnummer</td>
                                <td><?php echo $phonenumber ?></td>
                            </tr>
                            <tr>
                                <td width="300">E-mailadres</td>
                                <td><?php echo $email ?></td>
                            </tr>
                            <tr>
                                <td width="300">De gestelde vraag</td>
                                <td><?php echo $message ?></td>
                            </tr>
                        </table>
                        <br>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<br><br>
</body>
</html>