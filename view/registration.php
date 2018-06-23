<?php 
    require_once './components/register_component.php';
?>


<div class="container">
    <div class="row">
        <form method="POST" class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" name="registration[email]" type="email" class="validate">
                    <label for="email">Email</label>
                    <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                </div>
                <div class="input-field col s12">
                    <input id="login" name="registration[login]" type="text" class="validate">
                    <label for="login">login</label>
                    <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                </div>
                <div class="input-field col s12">
                    <input id="password" name="registration[passw]" type="password" class="validate">
                    <label for="password">password</label>
                    <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                </div>
                <div class="input-field col s12">
                    <input id="login" name="doRegist" type="submit" value="regist" class="validate">
                </div>
            </div>
        </form>
    </div>
</div>