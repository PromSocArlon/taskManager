<form action = "http://localhost/taskManager/?controller=User&action=connexion" method="post">
    <fieldset>
        <legend>Identifiant</legend>
        <p>
            <label for="login">Login :</label>
            <input type="text" name="login" id="login" placeholder="login" />
        </p>
        <p>
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" placeholder="password" />
            <input type="submit" name="submit" value="Identification" />
            <button><a href="http://localhost/Task/?controller=home&action=register"> Pas encore inscrit ?</a></button>
        </p>
    </fieldset>
</form>

