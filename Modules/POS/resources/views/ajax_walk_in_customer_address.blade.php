<div class="row">
    <div class="col-md-12">
        <div class="wsus__checkout_single_address">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="address_id"
                    class="form-check-input address_id" checked>
                <label class="form-check-label" for="{{$address['address_type']}}">
                    <span>{{ $address['first_name'] .' ' .$address['last_name']}}</span> <br />
                    <span class="address">{{ $address['address'] }}</span>
                </label>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        "use strict";
        $("input[name='address_id']").on("change", function() {
            let delivery_id = $("input[name='address_id']:checked").val();
            let deliveryCharge = $("input[name='address_id']:checked").data('delivery-charge');
            $("#order_address_id").val(delivery_id);
        });
    })
</script>
