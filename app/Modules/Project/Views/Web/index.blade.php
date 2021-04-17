@extends('BaseApp::layouts.web-contact')
@section('page-title')
    {{$page_title}}
@endsection
@section('content')
    <!-- Section -->
    <div class="section">

        <!-- Wrapper -->
        <div class="wrapper-small">

            <!-- Column -->
            <div class="c-col-12">

                <!-- Text Wrapper -->
                <div class="text-wrapper">
                    @if(session()->has('success'))
                        <div class="caption has-animation skew-up">{{session()->get('success')}}</div>
                    @endif
                    <div class="caption has-animation skew-up">CONTACT US</div>
                    <h1 class="big-title has-animation skew-up ">
                        <span style="text-transform: capitalize">{{$row['contact_us_page_title_first_word']}}</span>
                    <br>
                        {{$row['contact_us_page_title_last_chunk']}}
                    </h1>
                </div>
                <!-- Text Wrapper -->

            </div>
            <!-- Column -->

            <!-- Column -->
            <div class="c-col-6">

                <!-- Text Wrapper -->
                <div class="text-wrapper">
                    <p data-delay="0.9" class="big-p has-animation skew-up">
                        {{$rows['contact_us_page_description']}}
                    </p>
                </div>
                <!--/ Text Wrapper -->


            </div>
            <!--/ Column -->

            <!-- Column -->
            <div class="c-col-6">

                <!-- Text Wrapper -->
                <div class="text-wrapper">
                    <div data-delay="0.7"
                         class="caption has-animation skew-up">E-MAIL</div>
                    <p data-delay="0.9" class="big-p has-animation skew-up">
                        <a class="underline" href="mailto:{{$rows['email']}}">{{$rows['email']}}</a>
                    </p>
                </div>
                <!--/ Text Wrapper -->

                <span class="pe-empty-space" style="height: 60px"></span>

                <!-- Text Wrapper -->
                <div class="text-wrapper">
                    <div data-delay="0.5" class="caption has-animation skew-up">ADDRESS</div>
                    <p data-delay="0.2" class="big-p has-animation skew-up">
                        @forelse($row['address'] as $addres_part)
                            {{$addres_part}}
                            <br>
                         @empty
                        @endforelse
                     </p>
                </div>
                <!--/ Text Wrapper -->

                <span class="pe-empty-space" style="height: 60px"></span>

                <!-- Text Wrapper -->
                <div class="text-wrapper">
                    <div class="caption has-animation skew-up">PHONE</div>
                    <p data-delay="0.2" class="big-p has-animation skew-up">
                        {{$rows['mobile_number']}}
                    </p>
                </div>
                <!--/ Text Wrapper -->

            </div>
            <!--/ Column -->


        </div>
        <!--/ Wrapper -->

        <!-- Wrapper -->
        <div class="wrapper">

            <!-- Column -->
            <div class="c-col-12">

                <!-- Contact Form -->
                <div class="c-form">

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
                                E-mail
                            </label>
                            <input
                                required
                                name="email"
                                placeholder="You'll not see any ads"
                                type="email"
                                autocomplete="off"/>
                            <div >
                                <ul>
                                    @forelse($errors->get('email') as $message)
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
                                Mobile Number
                            </label>
                            <input
                                required
                                name="mobile_number"
                                placeholder="Promise we'll not disturb"
                                type="text"
                                autocomplete="off"/>
                            <div >
                                <ul>
                                    @forelse($errors->get('mobile_number') as $message)
                                        <li>
                                            <span class="text-danger"> {{$message}}</span>
                                        </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <!--/ Form Field-->
                        <!-- Form Field (Textarea)-->
                        <div class="message-wrap">
                            <label>
                                Your message
                            </label>
                            <textarea
                                required
                                name="message"
                                rows="5"
                                placeholder="Looking forward for your precious words.."
                            ></textarea>
                            <div >
                                <ul>
                                    @forelse($errors->get('message') as $message)
                                        <li>
                                            <span class="text-danger"> {{$message}}</span>
                                        </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <!--/ Form Field (Textarea)-->

                        <!-- Checkbox -->
                        <div class="privacy-wrap">
                            <input
                                name="privacy"
                                type="checkbox"
                               required
                            />
                            <span>Accept Privacy</span>

                            <div >
                                <ul>
                                    @forelse($errors->get('privacy') as $message)
                                        <li>
                                            <span class="text-danger"> {{$message}}</span>
                                        </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <!--/ Checkbox -->

                        <!-- Button -->
                        <div class="send-wrap">
                            <button type="submit" class="button button-block">Submit</button>
                        </div>
                        <!--/ Button -->



                    </form>
                </div>
                <!--/Contact Form -->


            </div>
            <!--/Column -->

        </div>
        <!--/Wrapper-->

    </div>
    <!--/Section -->

    <!--Section -->
    <div class="section">

        <!-- Wrapper -->
        <div class="wrapper-small">

            <!-- Column -->
            <div class="c-col-12 align-center">
                <div class="caption has-animation skew-up">SEE SMOETHING MORE</div>
                <h1 data-delay="0.2" class="big-title has-animation skew-up"><a href="about.html" class="underline">About
                        Us</a></h1>
            </div>
            <!--/ Column -->

        </div>
        <!--/ Wrapper -->

    </div>
    <!--/ Section -->
@endsection
