{include file="header.tpl"}

<main>
    <img src="/img/background1.webp" alt="" class="background-form background-form--1">
    <img src="/img/background2.webp" alt="" class="background-form background-form--2">

    {if $content_type == 'offer'}
        {include file="form-admin-offers.tpl" offer=$result}
    {elseif $content_type == 'company'}
        {include file="form-admin-companies.tpl" company=$result}
    {elseif $content_type == 'user'}
        {include file="form-admin-users.tpl" user_card=$result}
    {/if}
</main>

{include file="footer.tpl"}