
        <!-- Column -->
        <div class="c-col-12">

            <!-- Carousel -->
            <div class="pe-carousel swiper-container">
                <div class="swiper-wrapper">
                    @foreach($component->SliderImages as $field)
                    <div class="pe-carousel-item swiper-slide">
                        <img alt="Carousel Image" src="{{'\storage\projects\\'.$field->value}}">
                    </div>
                    @endforeach

                </div>

                <span class="carousel-navigate">
                                    <i class="fa fa-chevron-left"></i>
                                    <i class="fa fa-chevron-right"></i>
                                </span>
            </div>
            <!--/ Carousel -->

        </div>
        <!--/ Column -->

