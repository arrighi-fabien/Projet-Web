<div class="btn__pagination">
    {if $nb_page <= 2}
        <button style="display: none;" class="btn btn--secondary btn--pagination btn--pagination--first" onClick="paginationOffer('.btn--pagination--first')" data-pagination-page=1 data-pagination-max={$max_page}>1</button>
        <button style="display: none;" class="btn--secondary btn--pagination--first--separator" disable>...</button>
    {else}
        <button style="display: inline-block;" class="btn btn--secondary btn--pagination btn--pagination--first" onClick="paginationOffer('.btn--pagination--first')" data-pagination-page=1 data-pagination-max={$max_page}>1</button>
        <button style="display: inline-block;" class="btn--secondary btn--pagination--first--separator" disable>...</button>
    {/if}
    {if $nb_page <= 1}
        <button style="display: none;" class="btn btn--secondary btn--pagination btn--pagination--previous" onClick="paginationOffer('.btn--pagination--previous')" data-pagination-page={$nb_page-1} data-pagination-max={$max_page}>{$nb_page-1}</button>
    {else}
        <button style="display: inline-block;" class="btn btn--secondary btn--pagination btn--pagination--previous" onClick="paginationOffer('.btn--pagination--previous')" data-pagination-page={$nb_page-1} data-pagination-max={$max_page}>{$nb_page-1}</button>
    {/if}
    <button class="btn btn--primary btn--pagination btn--pagination--current" disable>{$nb_page}</button>
    {if $nb_page >= $max_page}
        <button style="display: none;" id="btn-pagination_next" class="btn btn--secondary btn--pagination btn--pagination--next" onClick="paginationOffer('.btn--pagination--next')" data-pagination-page={$nb_page+1} data-pagination-max={$max_page}>{$nb_page+1}</button>
    {else}
        <button style="display: inline-block;" id="btn-pagination_next" class="btn btn--secondary btn--pagination btn--pagination--next" onClick="paginationOffer('.btn--pagination--next')" data-pagination-page={$nb_page+1} data-pagination-max={$max_page}>{$nb_page+1}</button>
    {/if}
    {if $nb_page >= $max_page-1}
        <button style="display: none;" class="btn--secondary btn--pagination--last--separator" disable>...</button>
        <button style="display: none;" id="btn-pagination_last" class="btn btn--secondary btn--pagination btn--pagination--last" onClick="paginationOffer('.btn--pagination--last')" data-pagination-page={$max_page} data-pagination-max={$max_page}>{$max_page}</button>
    {else}
        <button style="display: inline-block;" class="btn--secondary btn--pagination--last--separator" disable>...</button>
        <button style="display: inline-block;" id="btn-pagination_last" class="btn btn--secondary btn--pagination btn--pagination--last" onClick="paginationOffer('.btn--pagination--last')" data-pagination-page={$max_page} data-pagination-max={$max_page}>{$max_page}</button>
    {/if}
</div>