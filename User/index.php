<?php
    session_start();

    require_once('Manager/UsersManager.php');
    require_once('Entity/User.php');
    require_once("../conf.php");

    try {
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $manager = new UsersManager($db);
        $users = $manager->getAll();

    }
    
    catch (PDOException $e) {
        print('<br/>Erreur de connexion : ' . $e->getMessage());
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Liste d'Utilisateur</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

    <body>
        <center>
            <main class="container">
                <div class="row">
                    <section class="col-12">
                        <?php
                            if (!empty($_SESSION['error'])) {
                                echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error'] . '</div>';
                                
                                $_SESSION['error'] = "";
                            }
                        ?>

                        <?php
                            if (!empty($_SESSION['message'])) {
                                echo '<div class="alert alert-success" role="alert">' . $_SESSION['message'] . '</div>';
                                
                                $_SESSION['message'] = "";
                            }
                        ?>

                        <h1>Liste d'Utilisateur</h1>

                        <table class="table">
                            <thead>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Rôles</th>
                            </thead>

                            <tbody>
                                <?php
                                    foreach ($users as $user) {
                                ?>
                                        <tr>
                                            <td><?= $user->getId() ?></td>
                                            <td><?= $user->getEmail() ?></td>
                                            <td><?= $user->getRoles() ?></td>
                                            <td><a href="details.php?id=<?= $user->getId() ?>">Voir</a> <a href="edit.php?id=<?= $user->getId() ?>">Modifier</a> <a href="remove.php?id=<?= $user->getId() ?>">Supprimer</a></td>
                                        </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>

                        <a href="add.php" class="btn btn-primary">Ajouter un Utilisateur</a>
                    </section>
                </div>
            </main>
        </center>
    </body>
</html>