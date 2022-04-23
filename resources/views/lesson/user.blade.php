@extends('layouts.app')
@section('content')
{{--    <div class="container-fluid">--}}
        <div class="row">
            <div class="col-md-12">
                <h1>
                    {{__ ('Lessons')}}
                </h1>
                <br/>
                <div class="title m-b-md">

                </div>
                @if(count($lessons) === 0)
                    <h2>
                        {{ __("You don't have any lessons open yet") }}
                    </h2>
                    <br>
                    <p class="color-red text-italic">Для того, чтобы получить доступ к урокам, вам надо выбрать интересующие Вас темы и сделать банковский перевод.</p>
                    <br/>
                    <h4>Список уроков:</h4>
                    <table class="table table-responsive-sm">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nr</th>
                            <th scope="col">{{__ ('Select')}}</th>
                            <th scope="col">{{__ ('Title')}}</th>
                            <th scope="col">{{__ ('Code')}}</th>
                            <th scope="col">{{__ ('Price')}}</th>
                        </tr>
                        </thead>
                        <tr>
                            <td>1</td>
                            <td>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                </div>
                            </td>
                            <td>Средневековье</td>
                            <td>SREDNEVEKOVYE</td>
                            <td>15 euro</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                </div>
                            </td>
                            <td>Возрождение</td>
                            <td>VOZROZDENIE</td>
                            <td>20 euro</td>
                        </tr>
                         <tr>
                            <td>3</td>
                            <td>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                </div>
                            </td>
                            <td>Барокко</td>
                            <td>BAROCCO</td>
                            <td>25 euro</td>
                        </tr>
                    </table>
                    <h5>Сума к оплате: 30 евро (скидка 5 евро)</h5>
                    <br>
                    <h2>Как это работает</h2>
                    <br>
                    <p>Вы делаете банковские перевод на счет №№№№№№№№№ и в назначении платежа указываете код урока. Если уроков несколько - коды через запятую.</p>
                    <p>Как только деньги поступят на счет доступ к урокам будет открыт.</p>
                @else
                    <table class="table table-responsive-sm">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col"><i class="far fa-clipboard"></th>
                            <th scope="col">{{__ ('Title')}}</th>
                            <th scope="col">{{__ ('Course')}}</th>
                            <th scope="col">{{__ ('Actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($lessons AS $lesson)
                            <tr>
                                <th scope="row">{{ $lesson->id  }}</th>
                                <td>{{ $lesson->title }}</td>
                                <td>{{ $lesson->course->name }}</td>
                                <th><a class="btn btn-outline-success" href="{{ route('users.lessons.view', $lesson->id) }}">{{ __('Open') }}</a></th>
                            </tr>
                        @empty
                            <h2>
                                {{ __('No lessons') }}
                            </h2>
                        @endforelse
                        </tbody>
                    </table>
                @endif
            </div>
{{--        </div>--}}
    </div>
@endsection
