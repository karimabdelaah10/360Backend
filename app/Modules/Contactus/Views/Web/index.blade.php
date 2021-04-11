@extends('BaseApp::layouts.web')
@section('page-title')
    {{$page_title}}
@endsection
@section('content')
    <form action="/contactus" method="post">
        <input type="text" name="sss">
        <button type="submit">sssssssssssssssss</button>
    </form>
    <!-- Section -->
    <div class="section">

        <!-- Wrapper -->
        <div class="wrapper-small">

            <!-- Column -->
            <div class="c-col-12">

                <!-- Text Wrapper -->
                <div class="text-wrapper">
                    <div class="caption has-animation skew-up">CONTACT US</div>
                    <h1 class="big-title has-animation skew-up">Stay <br>in touch.</h1>
                </div>
                <!-- Text Wrapper -->

            </div>
            <!-- Column -->

            <!-- Column -->
            <div class="c-col-6">

                <!-- Text Wrapper -->
                <div class="text-wrapper">
                    <p data-delay="0.5" class="big-p has-animation lines-fade-up">
                        Big picture this is a no-brainer we <br>need to crystallize a plan so turnaround <br>rate nor
                        closer to the metal but organic growth, and on-brand but completeley fresh.

                    </p>
                </div>
                <!--/ Text Wrapper -->


            </div>
            <!--/ Column -->

            <!-- Column -->
            <div class="c-col-6">

                <!-- Text Wrapper -->
                <div class="text-wrapper">
                    <div data-delay="0.7" class="caption has-animation skew-up">E-MAIL</div>
                    <p data-delay="0.9" class="big-p has-animation skew-up"><a class="underline" href="#">hello@pethemes.com</a>
                    </p>
                </div>
                <!--/ Text Wrapper -->

                <span class="pe-empty-space" style="height: 60px"></span>

                <!-- Text Wrapper -->
                <div class="text-wrapper">
                    <div data-delay="0.7" class="caption has-animation skew-up">ADDRESS</div>
                    <p data-delay="0.9" class="big-p has-animation skew-up">32 Avenue of the Americas
                        <br>New York, NY 10013
                    </p>

                </div>
                <!--/ Text Wrapper -->

                <span class="pe-empty-space" style="height: 60px"></span>

                <!-- Text Wrapper -->
                <div class="text-wrapper">
                    <div class="caption has-animation skew-up">PHONE</div>
                    <p data-delay="0.2" class="big-p has-animation skew-up">+1 (125) 789 54 21</p>
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
{{--                <div class="c-form">--}}

                    <form method="post">

                        <!-- Form Field -->
                        <div class="field-wrap">
                            <label>
                                Name
                            </label>
                            <input placeholder="Who are you?" type="text" required autocomplete="off"/>
                        </div>
                        <!--/ Form Field -->

                        <!-- Form Field -->
                        <div class="field-wrap">
                            <label>
                                E-mail
                            </label>
                            <input placeholder="You'll not see any ads" type="email" required autocomplete="off"/>
                        </div>
                        <!--/ Form Field -->

                        <!-- Form Field -->
                        <div class="field-wrap">
                            <label>
                                Phone
                            </label>
                            <input placeholder="Promise we'll not disturb" type="text" required autocomplete="off"/>
                        </div>
                        <!--/ Form Field-->
                        <!-- Form Field (Textarea)-->
                        <div class="message-wrap">
                            <label>
                                Your message
                            </label>
                            <textarea rows="8" placeholder="Looking forward for your precious words.."></textarea>
                        </div>
                        <!--/ Form Field (Textarea)-->
                        <button type="submit" >Submit</button>

                        <!-- Checkbox -->
                        <div class="privacy-wrap">
                            <input type="checkbox"/>
                            <span>Accept Privacy</span>
                        </div>
                        <!--/ Checkbox -->

                        <!-- Button -->
                        <div class="send-wrap">
                            <button type="submit" class="button button-block">Submit</button>
                        </div>
                        <!--/ Button -->

                    </form>
{{--                </div>--}}
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
