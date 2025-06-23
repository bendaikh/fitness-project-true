<ul class="nav nav-pills flex-column " id="myTab4" role="tablist">
    <li class="nav-item">
        <a class="nav-link active show" id="footer-tab4" data-bs-toggle="tab" href="#footer" role="tab"
            aria-controls="footer" aria-selected="true">{{ __('Footer Section') }}</a>
    </li>
    @if ($code === $languages->first()->code)
        <li class="nav-item">
            <a class="nav-link" id="auth-tab4" data-bs-toggle="tab" href="#auth" role="tab" aria-controls="auth"
                aria-selected="true">{{ __('Auth Section') }}</a>
        </li>
    @endif

    <li class="nav-item">
        <a class="nav-link" id="footer-tab4" data-bs-toggle="tab" href="#callToActionButton" role="tab"
            aria-controls="callToActionButton" aria-selected="true">{{ __('Call To Action Button') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="trainerPage-tab4" data-bs-toggle="tab" href="#trainerPage" role="tab"
            aria-controls="trainerPage" aria-selected="true">{{ __('Trainer Page') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="servicePage-tab4" data-bs-toggle="tab" href="#servicePage" role="tab"
            aria-controls="servicePage" aria-selected="true">{{ __('Service Page') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="awardPage-tab4" data-bs-toggle="tab" href="#awardPage" role="tab"
            aria-controls="awardPage" aria-selected="true">{{ __('Award') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="faqPage-tab4" data-bs-toggle="tab" href="#faqPage" role="tab"
            aria-controls="faqPage" aria-selected="true">{{ __('Faq') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="membershipPage-tab4" data-bs-toggle="tab" href="#membershipPage" role="tab"
            aria-controls="membershipPage" aria-selected="true">{{ __('Membership') }}</a>
    </li>
    @if (isShopActive())
    <li class="nav-item">
        <a class="nav-link" id="shopPage-tab4" data-bs-toggle="tab" href="#shopPage" role="tab"
            aria-controls="shopPage" aria-selected="true">{{ __('Shop Page') }}</a>
    </li>
    @endif
</ul>
