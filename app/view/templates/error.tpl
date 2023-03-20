{include file="header.tpl"}
<main>
    <img src="/img/background1.webp" alt="" class="background-form background-form--1">
    <img src="/img/background2.webp" alt="" class="background-form background-form--2">

    <div class="error-display">
        <h1>{$error_type}</h1>
    </div>
</main>

{if $user == null}
    {include file="login.tpl"}
{/if}

{include file="footer.tpl"}