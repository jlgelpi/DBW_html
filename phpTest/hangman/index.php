<?php
include_once "globals.inc.php";
// games = sorted(
//        [game for game in Game.query.all() if game.won],
//        key=lambda game: -game.points)[:10]
//    return flask.render_template('home.html', games=games)
$games = $db->query("SELECT * from games order by points desc limit 10")->fetchArray();


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hangman game (PHP)</title>
        <!-- Bootstrap -->
        <link rel="stylesheet"
              href="<?php print $GLOBALS['static'] ?>/bootstrap.min.css">
        <link rel="stylesheet"
              href="<?php print $GLOBALS['static'] ?>/main.css">
    </head>
    <body>
        <div class="container text-center">
            <h1>Hangman game (PHP)</h1>
            <div class="row vspace">
                <div class="col-md-6 col-md-offset-3">
                    <form action="new.php" class="form-inline">
                        <div class="form-group vspace">
                            <input name="player" class="input-lg" required="required"
                                   placeholder="Your name">
                            <button class="btn btn-primary btn-lg" type="submit">Play!</button>
                        </div>
                    </form>

                    <div class="panel panel-default vspace">
                        <div class="panel-heading">Top 10</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Player</th>
                                    <th>Word</th>
                                    <th>Errors</th>
                                    <th>Points</th>
                            <tbody>
                                {% for game in games %}
                                <tr>
                                    <td>{{ loop.index }}</td>
                                    <td>{{ game.player }}</td>
                                    <td class="text-success">{{ game.current }}</td>
                                    <td class="text-danger spaced">{{ game.errors }}</td>
                                    <td>{{ game.points }}</td>
                                    {% endfor %}
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?php print $GLOBALS['static'] ?>/jquery.min.js"></script>
        <script src="<?php print $GLOBALS['static'] ?>/bootstrap.min.js"></script>

        {% block bottom %}BLOCK2{% endblock %}
    </body>
</html>

