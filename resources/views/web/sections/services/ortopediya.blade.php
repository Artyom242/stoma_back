@extends('web.layout')

@section('header')
    @include('web.layouts.header.without_middle_header')
@endsection

@section('content')

    <section>
        <div class="__container">
            <h2 class="title_section">Ортопедия</h2>

            <div class="services_feedback_sections">
                @foreach($servicesBySection as $service)
                    <a href="{{asset('services/'. $service['name_en'])}}" class="services_feedback_block btn_blue">{{$service['name']}}</a>
                @endforeach
            </div>
        </div>
    </section>

    <section>
        <div class="__container">
            <div class="descriptions_section">
                <div>
                    <h3 class="descriptions_title">Ортопедия: Все, что вам нужно знать</h3>
                    <div class="descriptions_block">
                        <p>
                            Ортопедия - это важная область медицины, которая занимается диагностикой, лечением, профилактикой и реабилитацией заболеваний и травм опорно-двигательного аппарата. В состав этого аппарата входят кости, суставы, связки, сухожилия, мышцы и нервы. Ортопедическая помощь помогает восстановить подвижность и уменьшить боль, что существенно повышает качество жизни пациентов.
                        </p>
                    </div>
                </div>
                <div>
                    <h3 class="descriptions_title">Возможности стоматолога-ортопеда</h3>
                    <div class="descriptions_block">
                        <p>Современный ортопед занимается восстановлением зубов (отдельных и ряда), а также протезированием. Восстановление — не только достижение эстетичности, но и возврат функций зубов. Специализация ортопеда охватывает съемные, несъемные и условно-съемные протезы.</p>
                        <p>К стоматологу-ортопеду нужно придти несколько раз. Во время первого визита он определит повреждения зубного ряда, тяжесть этих повреждений и возможность устранения. Проще говоря, он составит план лечения, который может включать:</p>
                        <ul class="descriptions_block_list">
                            <li>отслеживание состояния полости рта, подготовку к проведению протезирования;</li>
                            <li>проведение набора ортопедических манипуляций;</li>
                            <li>подбор метода восстановления или варианта протезирования;</li>
                            <li>выбор вида протеза и его установку.</li>
                        </ul>
                    </div>
                </div>
                <div>
                    <h3 class="descriptions_title">5 причин, чтобы обратиться к нашему стоматологу-ортопеду</h3>
                    <div class="descriptions_block">
                        <ul class="descriptions_block_list">
                            <li>Огромный профессиональный потенциал и опыт доктора.</li>
                            <li>Использование современных методик лечения.</li>
                            <li>Применение инновационных материалов для протезирования.</li>
                            <li>Комплексный подход и гарантированный результат.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('web.components.map')

@endsection
