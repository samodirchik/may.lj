<form action="<?= url('/auth/regproc') ?>" method="post">
    <label>Login:
        <input type="text" name="login" required/>
    </label>
    <label>Password:
        <input type="password" name="pass" required/>
    </label>
    <label>Confirm password:
        <input type="password" name="pass_conf" required/>
    </label>
    <label>Email:
        <input type="email" name="email" required/>
    </label>
    <input type="submit" value="зарегистрироваться"/>
</form>

