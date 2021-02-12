{if $cart.totals.total_including_tax.value > 150}
    <div class="row" id="promo" style="display: block">
        <div class="col-2">
            <div id="root">
                <div role="dialog" id="wpreview" class="page-1 page-last" expanded="true" style="">
                    <div class="container-promo">
                        <div class="body-promo">
                            <div class="content-promo no-fields"><h1 class="title-promo">SVEIKINAME!</h1>
                                <p class="description-promo">
                                <div>ŠIAM UŽSAKYMUI DOVANOJAME JUMS 5% NUOLAIDĄ SU KODU</div>
                                </p>
                                <form novalidate="" class="form valid pristine"></form>
                                <p class="note">
                                    <span>YSCDH7KQ</span>
                                </p></div>
                        </div>
                        <button type="button" id="hider" class="close" style="padding: 5px 10px;">x</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('hider').onclick = function() {
            document.getElementById('promo').hidden = true;
        }
    </script>
{/if}