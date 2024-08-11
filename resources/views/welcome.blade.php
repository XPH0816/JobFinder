@include('frontend/partials.head')
@include('frontend/partials.nav')

@include('frontend/partials.hero')
@include('frontend/partials.category')

<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
                <h2 class="mb-5 h3">Recent Jobs</h2>
                <div class="rounded border jobs-wrap">


                    @foreach ($jobs as $job)
                        <a href="{{ route('job.show', [$job->id, $job->slug]) }}"
                            class="job-item d-block d-md-flex align-items-center border-bottom

                @if ($job->type == 'fulltime') fulltime
                @elseif($job->type == 'freelance')
                freelance
                @elseif($job->type == 'part time')
                partime
                @elseif($job->type == 'remote')
                remote @endif

                ">
                            @if ($job->company->logo ?? '')
                                <div class="company-logo blank-logo text-center text-md-left pl-3">
                                    <img src="{{ asset('/uploads/logo') }}/{{ $job->company->logo ?? '' }}"
                                        alt="Image" class="img-fluid mx-auto">
                                </div>
                            @endif
                            <div class="job-details h-100">
                                <div class="p-3 align-self-center">
                                    <h3>{{ $job->title }}</h3>
                                    <div class="d-block d-lg-flex">
                                        <div class="mr-3"><span class="icon-suitcase mr-1"></span>
                                            {{ Str::limit($job->position, 20) }}</div>
                                        <div class="mr-3"><span class="icon-room mr-1"></span>
                                            {{ Str::limit($job->address, 20) }}</div>
                                        <div><span class="icon-money mr-1"></span>{{ $job->salary }}</div>
                                        {{-- <div><span class="icon-eye ml-3 mr-1"></span> ${{ $job->salary }}</div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="job-category align-self-center">
                                <div class="p-3">
                                    <span
                                        class=" p-2 rounded border

                    @if ($job->type == 'fulltime') text-info  border-info
                    @elseif($job->type == 'freelance')
                    text-warning   border-warning
                    @elseif($job->type == 'part time')
                    text-danger   border-danger

                    @elseif($job->type == 'remote')
                    text-dark   border-dark @endif

                    ">{{ ucwords($job->type) }}</span>
                                </div>
                            </div>
                        </a>
                    @endforeach




                </div>

                <div class="col-md-12 text-center mt-5">
                    <a href="{{ route('alljobs') }}" class="btn btn-primary rounded py-3 px-5"><span
                            class="icon-plus-circle"></span> Show More Jobs</a>
                </div>
            </div>

        </div>
    </div>
</div>

@include('frontend/partials.testimonial')


<div class="site-blocks-cover overlay inner-page" style="background-image: url('external/images/hero_1.jpg');"
    data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-6 text-center" data-aos="fade">
                <h1 class="h3 mb-0">Your Dream Job</h1>
                <p class="h3 text-white mb-5">Is Waiting For You</p>
                <p><a href="/register" class="btn btn-outline-warning py-3 px-4">Job seeker</a> <a
                        href="{{ route('employer.register') }}" class="btn btn-warning py-3 px-4">Employer </a></p>

            </div>
        </div>
    </div>
</div>



<div class="site-section site-block-feature bg-light">
    <div class="container">

        <div class="text-center mb-5 section-heading">
            <h2>Why Choose Us</h2>
        </div>

        <div class="d-block d-md-flex border-bottom">
            <div class="text-center p-4 item border-right col-6 col-sm" data-aos="fade">
                <span class="display-3 d-block text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shield-check-filled"
                        width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#28a745"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M11.998 2l.118 .007l.059 .008l.061 .013l.111 .034a.993 .993 0 0 1 .217 .112l.104 .082l.255 .218a11 11 0 0 0 7.189 2.537l.342 -.01a1 1 0 0 1 1.005 .717a13 13 0 0 1 -9.208 16.25a1 1 0 0 1 -.502 0a13 13 0 0 1 -9.209 -16.25a1 1 0 0 1 1.005 -.717a11 11 0 0 0 7.531 -2.527l.263 -.225l.096 -.075a.993 .993 0 0 1 .217 -.112l.112 -.034a.97 .97 0 0 1 .119 -.021l.115 -.007zm3.71 7.293a1 1 0 0 0 -1.415 0l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.32 1.497l2 2l.094 .083a1 1 0 0 0 1.32 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z"
                            stroke-width="0" fill="currentColor" />
                    </svg>
                </span>
                <h2 class="h4">Credibility</h2>
                <p>We offer detailed and truthful employer information to help you make informed career decisions.</p>
                {{-- <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p> --}}
            </div>
            <div class="text-center p-4 item col-6 col-sm" data-aos="fade">
                <span class="display-3 d-block text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-check"
                        width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#28a745"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                        <path d="M15 19l2 2l4 -4" />
                    </svg>
                </span>
                <h2 class="h4">User Friendly</h2>
                <p>We prioritize a user-friendly experience, making it easy to navigate job listings, access detailed
                    employer information, and apply for positions that match your skills and aspirations.</p>
                {{-- <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p> --}}
            </div>
        </div>
        <div class="d-block d-md-flex">
            <div class="text-center p-4 item border-right col-6 col-sm" data-aos="fade">
                <span class="display-3 d-block text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin-filled"
                        width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#28a745"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M18.364 4.636a9 9 0 0 1 .203 12.519l-.203 .21l-4.243 4.242a3 3 0 0 1 -4.097 .135l-.144 -.135l-4.244 -4.243a9 9 0 0 1 12.728 -12.728zm-6.364 3.364a3 3 0 1 0 0 6a3 3 0 0 0 0 -6z"
                            stroke-width="0" fill="currentColor" />
                    </svg>
                </span>
                <h2 class="h4">Hyperlocal</h2>
                <p>We provide job opportunities tailored to the UTAR community and its surrounding area, connects you
                    with employers looking for talent right in your neighborhood, ensuring that you can find positions
                    close to home.</p>
                {{-- <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p> --}}
            </div>
            <div class="text-center p-4 item col-6 col-sm" data-aos="fade">
                <span class="display-3 d-block text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-tabler icon-tabler-square-rounded-plus-filled" width="44" height="44"
                        viewBox="0 0 24 24" stroke-width="1" stroke="#28a745" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M12 2l.324 .001l.318 .004l.616 .017l.299 .013l.579 .034l.553 .046c4.785 .464 6.732 2.411 7.196 7.196l.046 .553l.034 .579c.005 .098 .01 .198 .013 .299l.017 .616l.005 .642l-.005 .642l-.017 .616l-.013 .299l-.034 .579l-.046 .553c-.464 4.785 -2.411 6.732 -7.196 7.196l-.553 .046l-.579 .034c-.098 .005 -.198 .01 -.299 .013l-.616 .017l-.642 .005l-.642 -.005l-.616 -.017l-.299 -.013l-.579 -.034l-.553 -.046c-4.785 -.464 -6.732 -2.411 -7.196 -7.196l-.046 -.553l-.034 -.579a28.058 28.058 0 0 1 -.013 -.299l-.017 -.616c-.003 -.21 -.005 -.424 -.005 -.642l.001 -.324l.004 -.318l.017 -.616l.013 -.299l.034 -.579l.046 -.553c.464 -4.785 2.411 -6.732 7.196 -7.196l.553 -.046l.579 -.034c.098 -.005 .198 -.01 .299 -.013l.616 -.017c.21 -.003 .424 -.005 .642 -.005zm0 6a1 1 0 0 0 -1 1v2h-2l-.117 .007a1 1 0 0 0 .117 1.993h2v2l.007 .117a1 1 0 0 0 1.993 -.117v-2h2l.117 -.007a1 1 0 0 0 -.117 -1.993h-2v-2l-.007 -.117a1 1 0 0 0 -.993 -.883z"
                            fill="currentColor" stroke-width="0" />
                    </svg>
                </span>
                <h2 class="h4">Additional Services</h2>
                <p>We offer affordable services, including resume writing, blazer renting, professional makeup, and
                    photography, ensuring you present your best self to potential employers.</p>
                {{-- <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p> --}}
            </div>
        </div>
    </div>
</div>

@include('frontend/partials.footer')
