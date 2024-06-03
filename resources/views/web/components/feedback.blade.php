<section>
    <div class="__container feedback_section">
        <div class="feedback_section__title">
            <h2>Отзывы наших пациентов</h2>
            <button class="btn btn_submit feedback_title__btn openModalBtn">
                <span>Оставить отзыв</span>
            </button>
        </div>

        <div class="feedback_section__body">
            @foreach($feedbacks as $feedback)
                <div class="feedback_section__block">
                    <div class="pole row_pole feedback_gap">
                        <div class="pole row_pole feedback_block_profile">
                            <div class="img_profile">
                                <img src="{{asset('images/icons/profile.svg')}}" class="img" alt="Иконка профиля" />
                            </div>
                            <h5>{{$feedback->name}}</h5>
                        </div>

                        <div class="feedback_block_row_star">
                            <div class="feedback_block_data">
                                <p class="text_small">{{$feedback->created_at}}</p>
                            </div>
                            <div>
                                <img src="{{asset('images/icons/stars/star_yellow.svg')}}" alt="Желтая звезда" />
                            </div>
                            <div>
                                <img src="{{asset('images/icons/stars/star_yellow.svg')}}" alt="Желтая звезда" />
                            </div>
                            <div>
                                <img src="{{asset('images/icons/stars/star_yellow.svg')}}" alt="Желтая звезда" />
                            </div>
                            <div>
                                <img src="{{asset('images/icons/stars/star_yellow.svg')}}" alt="Желтая звезда" />
                            </div>
                            <div>
                                <img src="{{asset('images/icons/stars/star_yellow.svg')}}" alt="Желтая звезда" />
                            </div>
                        </div>
                    </div>

                    <div class="services_feedback_sections">
                        @foreach($feedback_services as $services)
                            @foreach($services as $service)
                                @if ($service->pivot->body_feedback_id == $feedback->id)
                                    <a href="" class="services_feedback_block btn_blue">{{$service->name}}</a>
                                @endif
                            @endforeach
                        @endforeach
                    </div>

                    <div>
                        <p>
                            {{$feedback->text}}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $feedbacks->onEachSide(5)->links() }}
    </div>
</section>
