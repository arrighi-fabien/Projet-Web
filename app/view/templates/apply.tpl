{include file="header.tpl"}

<div class="login-form card-background p-2 m-5-auto">
    <h2>Postuler</h2>
    {if $errors}
        <div class="alert alert--danger">
            <p class="error-message">{$errors}</p>
        </div>
    {/if}
    {if $success}
        <div class="alert alert--success">
            <p class="success-message">{$success}</p>
        </div>
    {/if}
    <form action="" method="post" enctype="multipart/form-data" class="login-form__content" id="apply-form">
        <div class="login-form__content__input">
            <label for="email">Email :</label>
            <input type="email" name="email" value="{$user->email}" id="email" placeholder="Email..." disabled>
        </div>
        <div class="login-form__content__input">
            <label for="last_name">Nom :</label>
            <input type="text" name="last_name" value="{$user->last_name}" id="last_name" placeholder="Nom..." disabled>
        </div>
        <div class="login-form__content__input">
            <label for="first_name">Prénom :</label>
            <input type="text" name="first_name" value="{$user->first_name}" id="first_name" placeholder="Prénom..." disabled>
        </div>
        <div class="login-form__content__input">
            <label for="cv">Sélectionnez un CV à télécharger :</label>
            <input type="file" accept=".pdf" name="cv" id="cv">
        </div>
        <div class="login-form__content__input">
            <label for="motivation_letter">Sélectionnez une lettre de motivation à télécharger :</label>
            <input type="file" accept=".pdf" name="motivation_letter" id="motivation_letter">
        </div>
        <input type="submit" value="Postuler" class="btn btn--primary">
    </form>
</div>

{include file="footer.tpl"}