<?php 
      require_once './components/login_component.php';
?>



<div class="container">
    <div class="row">
        <form method="POST" class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input id="login" name="login[login]" type="text" class="validate">
                    <label for="login">login</label>
                    <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                </div>
                <div class="input-field col s12">
                    <input id="password" name="login[passw]" type="password" class="validate">
                    <label for="password">password</label>
                    <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                </div>
                <div class="input-field col s12">
                    <input id="login" name="doLogin" type="submit" value="login" class="validate">
                </div>
            </div>
        </form>
    </div>
</div>