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
                    <h3 class="descriptions_title">Как проходит лечение?</h3>
                    <div class="descriptions_block">
                        <p>В своей работе мы  используем только самые современные и проверенные пломбировочные
                            материалы, которые основаны на нанотехнологиях. При пломбировании зубов все
                            материалы светового отверждения от ведущих западных производителей, которые имеют
                            высокую стойкость и эстетичность.</p>
                        <p>Когда вы обращаетесь к врачу не сразу, а затягиваете развитие кариеса, то дальнейшее
                            разрушение Вашего зуба однозначно приведет к пульпиту, и тогда обратиться к
                            стоматологу Вас  заставит нестерпимая зубная боль. При этом стоимость лечения будет
                            выше, поскольку придется обрабатывать и пломбировать каналы зуба.</p>
                        <p>При лечении осложнённого кариеса, который проводится с обязательным контролем
                            качества лечения, мы применяем особую лечебную прокладку с содержанием гидроокиси
                            кальция. Это необходимо для того, чтобы лечение было более долговечным и надежным.
                            Мы используем самые современные светоотверждаемые лечебные прокладки. </p>
                    </div>
                </div>
                <div>
                    <h3 class="descriptions_title">Какие виды кариеса лечим в Нашей стоматологии</h3>
                    <div class="descriptions_block">
                        <p>Поверхностный (кариес эмали) лечится нанесением фторсодержащих лаков, гелей,
                            растворов, а также применением кальция и фторсодержащих препаратов.</p>
                    </div>
                </div>
                <div>
                    <h3 class="descriptions_title">Акриловый протез</h3>
                    <div class="descriptions_block">
                        <p>Это ортопедическая конструкция из медицинского акрила (полимерной пластмассы) с искусственной десной и зубами. Такой протез называют пластинчатым. Бывает он полным (замещает все зубы) или частичным (закрывает отдельные дефекты зубного ряда). Полный съемный протез в полости рта фиксируется на деснах благодаря эффекту присасывания. На верхней челюсти ортопедическая конструкция держится удовлетворительно за счет твердого неба, на нижней челюсти его фиксация хуже. В частичном акриловом протезе предусмотрены крючки (кламмера), которыми он крепится к соседним зубам.
                        </p>

                        <p>Плюсы</p>
                        <ul class="descriptions_block_list">
                            <li>недорогие</li>
                            <li>быстро изготавливаются</li>
                            <li>достаточно прочные</li>
                            <li>ремонтопригодные</li>
                        </ul>

                        <p>Минусы</p>
                        <ul class="descriptions_block_list">
                            <li>нуждаются в замене каждые 3-5 года</li>
                            <li>могут вызывать аллергию</li>
                            <li>натирают слизистую</li>
                            <li>ухудшают восприятия вкуса</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('web.components.map')

@endsection
