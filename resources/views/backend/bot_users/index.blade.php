@extends('backend.layouts.app')

@section('content')

<div class="container">
	<div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                Пользователи Telegram
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive bot-users-table">
                            <table class="table table-striped table-bordered data-table">
                                <caption id="user_count">
                                    Всего пользователей: <b>{{ $botUsers->count() }}</b>
                                </caption>
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>
                                        <th>Логин</th>
                                        <th>Создан</th>
                                        <th>Изменен</th>
                                        <th colspan="3">Действия</th>
                                    </tr>
                                </thead>
                                <tbody id="users_table">
                                    @foreach($botUsers as $botUser)
                                        <tr>
                                            <td>{{$botUser->id}}</td>
                                            <td>{{$botUser->login}}</td>
                                            <td>{{$botUser->created_at}}</td>
                                            <td>{{$botUser->updated_at}}</td>
                                            <td>
                                            	<a href="#" class="btn btn-sm btn-danger btn-block">Удалить</a>
                                            </td>
                                            <td>
                                            	<a href="#" class="btn btn-sm btn-success btn-block">Посмотреть</a>
                                            </td>
                                            <td>
                                            	<a href="#" class="btn btn-sm btn-info btn-block">Изменить</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection