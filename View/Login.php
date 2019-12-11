<?php ob_start(); ?>
<div class="row align-items-center" >
    <div class="col"></div>
    <div class="col" style="max-width:300px">
        <form action="?page=connection" method="post" class="form-group ">
            <div>
                <label for="login">Login</label>
                <input type="text" class="form-control" name="login" value="<?php if (isset($connectionLogin)) echo $connectionLogin; ?>">
            </div>
            <div>
                <label for="pwd">Password</label>
                <input type="password" class="form-control" name="pwd">
            </div>
            <div>
                <input type="submit" class="btn btn-primary" value="Connexion">
            </div>
        </form>
    </div>
    <div class="col"></div>
</div>
<table class="table">
    <tr>
        <thead>
            <th>Login</th>
            <th>Mdp</th>
        </thead>
    </tr>
    <tr>
        <td>player1</td>
        <td>player</td>
    </tr>
    <tr>
        <td>player2</td>
        <td>player</td>
    </tr>
</table>
</div>
<?php
$content = ob_get_contents();
ob_clean();
?>