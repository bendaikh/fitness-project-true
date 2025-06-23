<form method="POST" action="{{ route('newsletter-request') }}" id="newsletterForm">
    @csrf
    <input type="text" placeholder="{{ __('Enter Your Email') }}" name="email">
    <button type="submit" id="subscribe_btn"><i class="fas fa-paper-plane"></i></button>
</form>


@push('scripts')
    <script>
        $(document).ready(function() {
            "use strict";
            $('#newsletterForm').on('submit', function(e) {
                e.preventDefault();
                const email = $(this).find('[name="email"]').val();

                if (email == '') {
                    toastr.error('Email is required');
                    return;
                }

                $("#subscribe_btn").prop("disabled", true);
                $("#subscribe_btn").html(`<i class="fas fa-spinner"></i>`);

                var form = $(this);
                var url = form.attr('action');
                var data = form.serialize();
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    beforeSend: function() {
                        $("#subscribe_btn").html(
                            '<i class="fas fa-spinner fa-spin"></i>'
                        )
                        // disable the button
                        $("#subscribe_btn").attr("disabled", true);

                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            toastr.success(response.message);
                            $("#newsletterForm")[0].reset();
                        } else {
                            toastr.error(response.message);
                        }
                        $("#subscribe_btn").html('<i class="fas fa-paper-plane"></i>')
                        $("#subscribe_btn").removeAttr("disabled")
                    },
                    error: function (err) {
                        if (err.status == 500) {
                            toastr.error('Something went wrong!')
                        } else {
                            toastr.error(err.responseJSON.message)
                        }
                        $("#subscribe_btn").html('<i class="fas fa-paper-plane"></i>')

                        $("#subscribe_btn").removeAttr("disabled")

                    }
                });
            });
        });
    </script>
@endpush
