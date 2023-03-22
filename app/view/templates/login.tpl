{include file="header.tpl"}

    <div class="login-form card-background p-2 m-5-auto ">
        <h2>Se connecter</h2>
        {if $errors}
            <div class="alert alert--danger">
                <p class="error-message">{$errors}</p>
            </div>
        {/if}
        <form action="/login/connect" method="post" class="login-form__content">
            <div class="login-form__content__input">
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" placeholder="Email...">
            </div>
            <div class="login-form__content__input">
                <div class="login-form__content__input__pwd-label">
                    <label for="password">Mot de passe :</label>
                    <a href="#" class="link-effect small-text">Mot de passe oublié ?</a>
                </div>
                <input type="password" name="password" id="password" placeholder="Mot de passe...">
            </div>
            <div class="login-form__content__checkbox">
                <input type="checkbox" name="remember" id="remember" value="1">
                <label for="remember">Se souvenir de moi</label>
            </div>
            <input type="submit" value="Se connecter" class="btn btn--primary">
        </form>
    </div>

{include file="footer.tpl"}