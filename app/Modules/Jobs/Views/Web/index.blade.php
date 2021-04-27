@extends('BaseApp::layouts.web-contact')
@section('page-title')
    {{@$page_title}}
@endsection
@section('content')
    <!-- Section -->
    <div class="section">

        <div class="wrapper-small">

            <!-- Column -->
            <div class="c-col-12">

                <!-- Text Wrapper -->
                <div class="text-wrapper align-center">
                    <div class="caption">OUR JOBS</div>
                    <h1 class="big-title">
                        {{@$row['jobs_page_title']}}
                    </h1>
                </div>
                <!--/ Text Wrapper -->

            </div>
            <!--/ Column -->

        </div>

        <div class="wrapper-small">

            <!-- Column -->
            <div class="c-col-8">

                @forelse($rows as $element)
                <!-- Text Wrapper -->
                <div class="text-wrapper">

                    <h3 class="title has-animation skew-up">
                        {{@$element->title}}
                    </h3>
                    <p class="p-p has-animation lines-up">
                    {{@$element->description}}
                    </p>
                    <h4 data-delay="0.2" class="big-title has-animation skew-up">
                        <a href="#form" class="underline">Apply Here</a>
                    </h4>

                </div>
                <!--/ Text Wrapper -->
                @empty
                @endforelse
            </div>
            <!--/ Column -->
        </div>


        <div class="wrapper-small" id="form">

            <!-- Column -->
            <div class="c-col-12 align-center">
                <h1 data-delay="0.2" class="big-title has-animation skew-up">
                    Apply Here
                </h1>
                <div class="text-wrapper">
                    @if(session()->has('success'))
                        <div class="caption has-animation skew-up">{{session()->get('success')}}</div>
                    @endif

                </div>
            </div>
            <!--/ Column -->

        </div>
        <div class="wrapper-small">
            <div class="c-col-12">

                <!-- Contact Form -->
                <div class="c-form" >

                    <form method="POST">
                    @csrf

                    <!-- Form Field -->
                        <div class="field-wrap">
                            <label>
                                Name
                            </label>
                            <input
                                required
                                name="name"
                                placeholder="Who are you?"
                                type="text"
                                autocomplete="off"/>
                            <div >
                                <ul>
                                    @forelse($errors->get('name') as $message)
                                        <li>
                                            <span class="text-danger"> {{$message}}</span>
                                        </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <!--/ Form Field -->


                        <!-- Form Field -->
                        <div class="field-wrap">
                            <label>
                                Subject
                            </label>
                            <input
                                required
                                name="subject"
                                placeholder="Subject ( Job Title )"
                                type="text"
                                autocomplete="off"/>
                            <div >
                                <ul>
                                    @forelse($errors->get('subject') as $message)
                                        <li>
                                            <span class="text-danger"> {{$message}}</span>
                                        </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <!--/ Form Field-->


                        <!-- Form Field -->
                        <div class="field-wrap">
                            <label>
                                Cv Url
                            </label>
                            <input
                                required
                                name="cv_url"
                                placeholder="Your cv url on drive or dropbox"
                                type="text"
                                autocomplete="off"/>
                            <div >
                                <ul>
                                    @forelse($errors->get('cv_url') as $message)
                                        <li>
                                            <span class="text-danger"> {{$message}}</span>
                                        </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <!--/ Form Field-->


                        <!-- Button -->
                        <div class="send-wrap">
                            <button type="submit" class="button button-block">Submit</button>
                        </div>
                        <!--/ Button -->



                    </form>
                </div>
                <!--/Contact Form -->


            </div>
        </div>

    </div>
    <!--/Section -->

@endsection
