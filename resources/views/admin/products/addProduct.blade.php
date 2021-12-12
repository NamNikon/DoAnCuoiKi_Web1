<section class="statistic">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
 <!-- DATA TABLE -->
 <h3 class="title-5 m-b-35 mr-5 mt-1">ADD NEW PRODUCT</h3>
 @if (@isset($msg))
 <h3 class="title-5 m-b-35 mr-5 mt-1">{{ $msg }}</h3>
 @endif
 <div class="table-responsive table-responsive-data2">
    <form action="/admin/product-add-new" method="post" novalidate="novalidate">
    {{ csrf_field() }}
        <div class="form-group">
            <label for="name" class="control-label mb-1">Name</label>
            <input id="cc-pament" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false">
        </div>
        <div class="form-group has-success">
            <label for="cc-name" class="control-label mb-1">Category</label>
            <input id="cc-name" name="cc-name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
        </div>
        <div class="form-group">
            <label for="price" class="control-label mb-1">Price</label>
            <input id="cc-number" name="price" type="tel" class="form-control cc-number identified visa" value="" data-val="true"
                data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                autocomplete="cc-number">
            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="quantity" class="control-label mb-1">Quantity</label>
                    <input id="cc-exp" name="quantity" type="tel" class="form-control cc-exp" value="" autocomplete="cc-exp">
                    <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                </div>
            </div>
            <div class="col-6">
                <label for="x_card_code" class="control-label mb-1">Security code</label>
                <div class="input-group">
                    <input id="x_card_code" name="x_card_code" type="tel" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code"
                        data-val-cc-cvc="Please enter a valid security code" autocomplete="off">

                </div>
            </div>
        </div>
        <div>
            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                <span id="payment-button-amount">Add</span>
                <span id="payment-button-sending" style="display:none;">Sending…</span>
            </button>
        </div>
    </form>
 </div>
 <!-- END DATA TABLE -->
            </div>
        </div>
    </div>
</section>