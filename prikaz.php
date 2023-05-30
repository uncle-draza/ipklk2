<?php
$osobe=isset($osobe)?$osobe:NULL;
if($osobe!=NULL){ ?>
<html>
    <head>
        <title>Prikaz</title>
    </head>
    <body>
        <table>
            <tr>
                <th>IME</th>
                <th>PREZIME</th>
                <th>GODISTE</th>
                <th>IZBRISI</th>
                <th>IZMENI</th>
            </tr>
            <?php foreach($osobe as $o){ ?>
                <tr>
                    <td><?= $o->id ?></td>
                    <td><?= $o->ime ?></td>
                    <td><?= $o->prezime ?></td>
                    <td><?= $o->godiste ?></td>
                    <td><a href="controller.php?action=izbrisi&id=<?= $o->id ?>">IZBRISI</a></td>
                    <td><a href="controller.php?action=izmeni&id=<?= $o->id ?>">IZMENI</a></td>
                </tr>
            <?php } ?>
        </table>
    </body>
</html>
<?php } ?>
