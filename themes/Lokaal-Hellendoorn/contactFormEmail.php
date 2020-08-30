<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Lokaal Hellendoorn</title>
</head>
<body bgcolor="#f7f7f7"
      style="font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-weight: 200; font-size: 18px;">
<br><br>
<table class="body-wrap" width="100%">
    <tr>
        <td class="container" bgcolor="#FFFFFF">
            <table cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <br><br>
                        <p>Iemand heeft het contact formulier ingevuld op de pagina
                            <?php echo htmlspecialchars($title) ?>:</p>
                        <br><br>
                        <table border="0" cellpadding="7" cellspacing="2" width="100%">
                            <tr>
                                <td width="300">Naam</td>
                                <td><?php echo htmlspecialchars($name) ?></td>
                            </tr>
                            <?php if (!empty($address)) { ?>
                            <tr>
                                <td width="300">Adres</td>
                                <td><?php echo htmlspecialchars($address) ?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td width="300">E-mailadres</td>
                                <td><?php echo htmlspecialchars($email) ?></td>
                            </tr>
                            <tr>
                                <td width="300">Telefoonnummer</td>
                                <td><?php echo htmlspecialchars($phonenumber) ?></td>
                            </tr>
                            <tr>
                                <td width="300">Nieuwsbrief</td>
                                <td><?php echo !empty($newsletter) ? "Ja" : "Nee" ?></td>
                            </tr>
                            <?php if (!empty($message)) { ?>
                            <tr>
                                <td width="300">Bericht</td>
                                <td><?php echo htmlspecialchars($message) ?></td>
                            </tr>
                            <?php } ?>
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