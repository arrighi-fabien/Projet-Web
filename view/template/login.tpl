{block name=login}
<div class="popup-background">
    <div class="popup-form card-background">
        <svg class="popup-form__close">
            <use href="src/img/sprite.svg#cancel"></use>
        </svg>
        <div class="login-form">
            <h2>Se connecter</h2>
            <form action="index.html" method="post" class="login-form__content">
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
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Se souvenir de moi</label>
                </div>
                <input type="submit" value="Se connecter" class="btn btn--primary">
            </form>
        </div>
    </div>
</div>
{/block}