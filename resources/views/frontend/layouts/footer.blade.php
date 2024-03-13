<section class="wrapper__section p-0">
    <div class="wrapper__section__components">
        <footer>
            <div class="wrapper__footer bg__footer-dark pb-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="widget__footer">
                                <figure class="image-logo">
                                    <img src="{{ asset($footerInfoApp->logo ?? '') }}" alt="" class="logo-footer">
                                </figure>
                                <p>{{ $footerInfoApp->description->first()->description ?? '' }}</p>
                                <div class="social__media mt-4">
                                    <ul class="list-inline">
                                        @foreach ($socialLinksApp as $link)
                                            <li class="list-inline-item">
                                                <a href="{{ $link->url }}" class="btn btn-social rounded text-white">
                                                    <i class="{{ $link->icon }}"></i>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget__footer">
                                <div class="dropdown-footer">
                                    <h4 class="footer-title">
                                        {{ $footerGridOneTitleApp->value ?? '' }}
                                        <span class="fa fa-angle-down"></span>
                                    </h4>
                                </div>
                                <ul class="list-unstyled option-content is-hidden">
                                    @foreach ($footerGridOnesApp as $footerGridOne)
                                        <li>
                                            <a href="{{ $footerGridOne->url ?? '' }}">
                                                {{ $footerGridOne->description->first()->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget__footer">
                                <div class="dropdown-footer">
                                    <h4 class="footer-title">
                                        {{ $footerGridTwoTitleApp->value ?? '' }}
                                        <span class="fa fa-angle-down"></span>
                                    </h4>
                                </div>
                                <ul class="list-unstyled option-content is-hidden">
                                    @foreach ($footerGridTwosApp as $footerGridTwo)
                                        <li>
                                            <a href="{{ $footerGridTwo->url ?? '' }}">
                                                {{ $footerGridTwo->description->first()->name ?? '' }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="widget__footer">
                                <div class="dropdown-footer">
                                    <h4 class="footer-title">
                                        {{ $footerGridThreeTitleApp->value ?? '' }}
                                        <span class="fa fa-angle-down"></span>
                                    </h4>
                                </div>
                                <ul class="list-unstyled option-content is-hidden">
                                    @foreach ($footerGridThreesApp as $footerGridThree)
                                        <li>
                                            <a href="{{ $footerGridThree->url ?? '' }}">
                                                {{ $footerGridThree->description->first()->name ?? '' }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrapper__footer-bottom bg__footer-dark">
                <div class="container ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="border-top-1 bg__footer-bottom-section">
                                <p class="text-white text-center">
                                    {{ $footerInfoApp->description->first()->copyright ?? '' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</section>
