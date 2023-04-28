<?php

require_once('./navbar.php');
require_once($_SERVER['DOCUMENT_ROOT'] . "/components/requirements.php");


$manager = new SponsorManager();


if (!empty($_POST["sponsor"])) {
    $sponsor = $_POST["sponsor"];

    $manager->createSponsor($brand);
} else if (!empty($_GET["delete"])) {
    $id = $_GET["delete"];
    $manager->deleteSponsorById($id);
}
?>
<link rel="stylesheet" href="../style.css">
<main>
    <table>
        <tr>
            <th>#</th>
            <th>Marque</th>
            <th>Supprimer</th>
            <th>Editer</th>
        </tr>

        <?php

        $sponsor = new Sponsor();
        $statement = $manager->getAllSponsors();
        foreach ($statement as $key => $value) {
            echo ("<tr>");
            echo ("<th>" . $value->getID() . "</th>");
            echo ("<td>" . $value->getBrand() . "</td>");
            echo ("<td>" . "<a href='/components/sponsor.php?delete=" . $value->getID() . "'>Delete</a>" . "</td>");
            echo ("<td>" . "Edit" . "</td>");
            echo ("</tr>");
        }
        ?>
    </table>

    <form action="/components/sponsor.php" method="post">
        <label for="brand">Marque</label>
        <input type="text" name="brand" id="brand">

        <input type="submit" value="Confirmer">
    </form>

</main>